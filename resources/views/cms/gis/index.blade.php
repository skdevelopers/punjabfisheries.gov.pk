@extends('admin.layouts.app')
@section('title','GIS — Admin')


@push('head')
    <style>#map{height:calc(100vh - 7rem)}</style>
@endpush


@section('content')
    <div x-data="gisAdmin()" x-init="init()" class="px-4 py-4">
        <div class="flex items-center gap-2 mb-3">
            <input type="file" x-ref="file" class="hidden" @change="importKml">
            <button @click="$refs.file.click()" class="px-3 py-2 rounded border">Import KML/KMZ</button>
            <button @click="exportGeoJSON" class="px-3 py-2 rounded border">Export GeoJSON</button>
            <button @click="publishDrafts" class="px-3 py-2 rounded bg-emerald-600 text-white">Publish Drafts</button>
            <span class="text-sm text-gray-500">Drafts: <span x-text="stats.drafts"></span> | Total: <span x-text="stats.total"></span></span>
        </div>
        <div id="map"></div>
    </div>

    <script src="{{ asset('assets/vendor/markerclusterer/index.min.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places,drawing&callback=initMap"></script>
    <script>
        let gmap, drawing, info;
        window.initMap = function(){}; // placeholder required by API, Alpine will setup


        function centroidOfPolygon(poly){
            const ring = poly[0]; let minLat=90,maxLat=-90,minLng=180,maxLng=-180;
            ring.forEach(([lng,lat])=>{minLat=Math.min(minLat,lat);maxLat=Math.max(maxLat,lat);minLng=Math.min(minLng,lng);maxLng=Math.max(maxLng,lng);});
            return {lat:(minLat+maxLat)/2, lng:(minLng+maxLng)/2};
        }


        function gisAdmin(){
            return {
                features: [],
                stats: { total:0, drafts:0 },
                markers: [], clusterer: null,


                async init(){
                    gmap = new google.maps.Map(document.getElementById('map'), { center:{lat:31.52,lng:74.35}, zoom:7 });
                    info = new google.maps.InfoWindow();


                    drawing = new google.maps.drawing.DrawingManager({
                        drawingControl: true,
                        drawingControlOptions: { drawingModes: ['marker','polygon','rectangle'] },
                        markerOptions: {}, polygonOptions: { editable:true }, rectangleOptions: { editable:true }
                    });
                    drawing.setMap(gmap);


                    google.maps.event.addListener(drawing, 'overlaycomplete', (e)=>{
                        const gj = this.overlayToGeoJSON(e);
                        const f = { type:'Feature', geometry: gj, properties: { name:'Draft Feature', type:'farm', status:'draft' } };
                        this.features.push(f);
                        this.refresh();
                    });


                    await this.loadPublished();
                },

                async loadPublished(){
                    const {data} = await axios.get('/api/gis/places',{params:{status:'published'}});
                    this.features = data.features || [];
                    this.refresh();
                },


                overlayToGeoJSON(e){
                    if(e.type==='marker'){
                        const p = e.overlay.getPosition();
                        return { type:'Point', coordinates:[p.lng(), p.lat()] };
                    }
                    if(e.type==='polygon'){
                        const path = e.overlay.getPath().getArray().map(latlng=>[latlng.lng(), latlng.lat()]);
                        if(path.length && (path[0][0]!==path[path.length-1][0] || path[0][1]!==path[path.length-1][1])) path.push(path[0]);
                        return { type:'Polygon', coordinates:[path] };
                    }
                    if(e.type==='rectangle'){
                        const b = e.overlay.getBounds();
                        const ne = b.getNorthEast(), sw = b.getSouthWest();
                        const ring = [ [sw.lng(),sw.lat()], [ne.lng(),sw.lat()], [ne.lng(),ne.lat()], [sw.lng(),ne.lat()], [sw.lng(),sw.lat()] ];
                        return { type:'Polygon', coordinates:[ring] };
                    }
                    return null;
                },

                placeMarkerForFeature(f){
                    if(!f.geometry) return null;
                    let pos=null;
                    if(f.geometry.type==='Point'){
                        const [lng,lat]=f.geometry.coordinates; pos={lat,lng};
                    } else if(f.geometry.type==='Polygon'){
                        pos = centroidOfPolygon(f.geometry.coordinates);
                    }
                    if(!pos) return null;
                    const m = new google.maps.Marker({ position: pos, map: gmap });
                    m.addListener('click', ()=>{
                        const p=f.properties||{};
                        info.setContent(`<b>${p.name||'Untitled'}</b><div>Type: ${(p.type||'').toUpperCase()}</div><div>Status: ${p.status||'draft'}</div>`);
                        info.open({anchor:m,map:gmap});
                    });
                    return m;
                },

                refresh(){
                    if(this.clusterer){ this.clusterer.clearMarkers(); }
                    this.markers.forEach(m=>m.setMap(null)); this.markers=[];
                    this.features.forEach(f=>{ const m=this.placeMarkerForFeature(f); if(m) this.markers.push(m); });
                    this.clusterer = new markerClusterer.MarkerClusterer({ map:gmap, markers:this.markers });
                    this.stats.total = this.features.length;
                    this.stats.drafts = this.features.filter(f=> (f.properties?.status||f.properties?.Status||'draft')==='draft').length;
                },

                async importKml(e){
                    const file = e.target.files[0]; if(!file) return;
                    const form = new FormData(); form.append('file', file);
                    const {data} = await axios.post('/api/gis/import-kml', form, { headers:{'Content-Type':'multipart/form-data'} });
                    (data.features||[]).forEach(f=>this.features.push(f));
                    this.refresh();
                },


                exportGeoJSON(){
                    const fc = { type:'FeatureCollection', features: this.features };
                    const blob = new Blob([JSON.stringify(fc)],{type:'application/json'});
                    const url = URL.createObjectURL(blob); const a=document.createElement('a');
                    a.href=url; a.download=`fisheries-gis-${Date.now()}.geojson`; a.click(); URL.revokeObjectURL(url);
                },


                async publishDrafts(){
                    const drafts = this.features.filter(f=> (f.properties?.status||'draft')==='draft');
                    if(!drafts.length){ alert('No drafts'); return; }
                    const {data} = await axios.post('/api/gis/bulk-upsert', { features: drafts });
// flip local status to published
                    this.features = this.features.map(f=> ({...f, properties:{...(f.properties||{}), status:'published'}}));
                    this.refresh();
                    alert('Published!');
                },
            }
        }
    </script>
@endsection
