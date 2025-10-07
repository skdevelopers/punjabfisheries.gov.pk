@extends('frontend.layouts.app')
@section('title','GIS — Public Map')

@push('head')
    <style>#map{height:calc(100vh - 6rem)}</style>
@endpush

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="mb-3 flex items-center gap-2">
            <input id="searchBox" type="search" placeholder="Search place, city, or address…" class="w-full border rounded-lg px-3 py-2">
            <button id="searchBtn" class="px-3 py-2 rounded-lg bg-blue-600 text-white">Search</button>
        </div>
    </div>
    <div id="map"></div>

    @push('scripts')
        <script src="{{ asset('assets/vendor/markerclusterer/index.min.js') }}"></script>

        <script>
            (() => {
                // --- Your six places (addresses & plus codes) ---
                const SEED_PLACES = [
                    { name: 'Head Office',             type: 'office',   address: 'H834+5H Lahore, Pakistan' },
                    { name: 'Director Aqua Office',    type: 'office',   address: '2 Sanda Rd, Islampura, Lahore 54000, Pakistan' },
                    { name: 'Bhaseen Hatchery',        type: 'hatchery', address: 'MG36+VFC, Bhaseen, Lahore, Pakistan' },
                    { name: 'Faisalabad Hatchery',     type: 'hatchery', address: '94MG+7QM, Satayana Rd, Gulzar Colony, Faisalabad, Pakistan' },
                    { name: 'Farooqabad Office',       type: 'office',   address: 'PRM5+CJW Dara Nigah, Farooqabad, Pakistan' },
                    { name: 'Sargodha Office',         type: 'office',   address: 'Chak No. 43 NB Bypass Link Rd, Sargodha, Pakistan' },
                ];

                // --- Local cache for geocode results ---
                const CACHE_KEY = 'gis_seed_geocodes_v1';
                const cache = JSON.parse(localStorage.getItem(CACHE_KEY) || '{}');
                const saveCache = () => localStorage.setItem(CACHE_KEY, JSON.stringify(cache));

                let map, info, clusterer, markers = [];

                // --- SVG marker helpers (no external images; CSP-friendly) ---
                function svgPin(fill, glyphPath){
                    // Teardrop pin with white stroke + a small glyph in the center
                    return 'data:image/svg+xml;utf8,' + encodeURIComponent(
                        `<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <g fill="none" stroke="white" stroke-width="1.5">
                              <path fill="${fill}" d="M24 4c-8.3 0-15 6.7-15 15 0 10.6 13.4 23.2 14.0 23.8a1.5 1.5 0 0 0 2 0C25.6 42.2 39 29.6 39 19c0-8.3-6.7-15-15-15z"/>
                              <circle cx="24" cy="19" r="9" fill="${fill}" />
                            </g>
                            ${glyphPath}
                          </svg>`
                    );
                }
                const GLYPH_OFFICE =
                    `<path d="M16 30h16v-2H16v2zm2-4h12V14H18v12zm2-2v-8h8v8h-8z" fill="white" opacity="0.95"/>`;
                const GLYPH_FISH =
                    `<path d="M32 20c-3.5-2.5-7.4-3.3-11.8-2.4l-2.5-2.5-2.2 2.2 2.2 2.2c-1.1 1.1-1.7 2.3-1.7 3.5 0 1.2.6 2.4 1.7 3.5l-2.2 2.2 2.2 2.2 2.5-2.5c4.4.9 8.3 0.1 11.8-2.4-1.3-1.2-1.3-3.8 0-4.9zM15 19.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" fill="white" opacity="0.95"/>`;

                function iconFor(type){
                    const fill = (type === 'office') ? '#1f7aff' : '#10b981';
                    const glyph = (type === 'office') ? GLYPH_OFFICE : GLYPH_FISH;
                    return {
                        url: svgPin(fill, glyph),
                        scaledSize: new google.maps.Size(36, 36),
                        anchor: new google.maps.Point(18, 34)
                    };
                }

                function toMarker(item){
                    const m = new google.maps.Marker({
                        position: item.pos,
                        icon: iconFor(item.type),
                        title: item.name
                    });
                    m.addListener('click', () => {
                        const t = (item.type || '').toUpperCase();
                        const html = `
        <div style="min-width:240px">
          <div><b>${item.name}</b></div>
          <div>Type: ${t}</div>
          ${item.address ? `<div class="text-xs text-gray-600">${item.address}</div>` : ''}
        </div>`;
                        info.setContent(html);
                        info.open({ anchor:m, map });
                    });
                    return m;
                }

                function geomCenter(geom){
                    if (!geom) return null;
                    if (geom.type === 'Point') { const [lng,lat] = geom.coordinates; return { lat, lng }; }
                    if (geom.type === 'Polygon') {
                        const ring = geom.coordinates?.[0] || [];
                        let minLat=90,maxLat=-90,minLng=180,maxLng=-180;
                        for (const [lng,lat] of ring){ if(lat<minLat)minLat=lat; if(lat>maxLat)maxLat=lat; if(lng<minLng)minLng=lng; if(lng>maxLng)maxLng=lng; }
                        if (minLat>maxLat || minLng>maxLng) return null;
                        return { lat:(minLat+maxLat)/2, lng:(minLng+maxLng)/2 };
                    }
                    return null;
                }

                async function getApiFeatures(){
                    try{
                        if (window.axios){
                            const { data } = await axios.get('/api/gis/places', { params:{ status:'published' } });
                            return (data.features || []).map(gj => ({
                                name: gj.properties?.name || 'Untitled',
                                type: (gj.properties?.type || 'hatchery').toLowerCase(),
                                pos:  geomCenter(gj.geometry)
                            })).filter(x => !!x.pos);
                        } else {
                            const res = await fetch('/api/gis/places?status=published');
                            const data = await res.json();
                            return (data.features || []).map(gj => ({
                                name: gj.properties?.name || 'Untitled',
                                type: (gj.properties?.type || 'hatchery').toLowerCase(),
                                pos:  geomCenter(gj.geometry)
                            })).filter(x => !!x.pos);
                        }
                    }catch(e){ console.warn('API fetch failed; continuing with seeds only', e); return []; }
                }

                function geocodeOne(geocoder, place){
                    const key = `${place.address}|${place.type}`;
                    if (cache[key]) return Promise.resolve({ ...place, pos: cache[key] });

                    return new Promise((resolve) => {
                        geocoder.geocode({ address: place.address }, (results, status) => {
                            if (status === 'OK' && results[0]) {
                                const loc = results[0].geometry.location;
                                const pos = { lat: loc.lat(), lng: loc.lng() };
                                cache[key] = pos; saveCache();
                                resolve({ ...place, pos });
                            } else {
                                console.warn('Geocode failed for', place.address, status);
                                resolve(null);
                            }
                        });
                    });
                }

                async function geocodeSeeds(){
                    const geocoder = new google.maps.Geocoder();
                    const promises = SEED_PLACES.map(p => geocodeOne(geocoder, p));
                    const out = await Promise.all(promises);
                    return out.filter(Boolean);
                }

                function dedupeByName(items){
                    const seen = new Set(); const out = [];
                    for (const it of items) {
                        const k = `${(it.name||'').toLowerCase()}|${it.type}`;
                        if (seen.has(k)) continue;
                        seen.add(k); out.push(it);
                    }
                    return out;
                }

                function fitToMarkers(ms){
                    if (!ms.length) return;
                    const bounds = new google.maps.LatLngBounds();
                    ms.forEach(m => bounds.extend(m.getPosition()));
                    map.fitBounds(bounds);
                    if (map.getZoom() > 14) map.setZoom(14);
                }

                window.initMap = async function(){
                    map  = new google.maps.Map(document.getElementById('map'), {
                        center:{ lat:31.5, lng:74.3 }, zoom:7, mapTypeControl:false
                    });
                    info = new google.maps.InfoWindow();

                    const [apiItems, seedItems] = await Promise.all([ getApiFeatures(), geocodeSeeds() ]);
                    const items = dedupeByName([ ...apiItems, ...seedItems ]);

                    markers  = items.map(toMarker);
                    clusterer = new markerClusterer.MarkerClusterer({ map, markers });
                    fitToMarkers(markers);

                    // Search
                    const input = document.getElementById('searchBox');
                    const btn   = document.getElementById('searchBtn');
                    const ac    = new google.maps.places.Autocomplete(input, { fields:['geometry','name'] });

                    ac.addListener('place_changed', () => {
                        const plc = ac.getPlace();
                        if (plc?.geometry?.location) { map.panTo(plc.geometry.location); map.setZoom(13); }
                    });

                    btn.addEventListener('click', () => {
                        const q = (input.value || '').toLowerCase();
                        const hit = items.find(i => i.name.toLowerCase().includes(q));
                        if (hit) { map.panTo(hit.pos); map.setZoom(12); }
                    });
                };
            })();
        </script>

        {{-- Keep only "defer" --}}
        <script defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places,drawing&callback=initMap"></script>
    @endpush

@endsection
