<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::ordered()->paginate(10);
        return view('cms.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('cms.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'background_color' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:7',
            'overlay_opacity' => 'nullable|numeric|between:0,1',
        ]);

        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sliders', 'public');
            $data['image_path'] = $imagePath;
        }

        Slider::create($data);
        return redirect()->route('cms.sliders.index')->with('success', 'Slider created successfully!');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('cms.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'background_color' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:7',
            'overlay_opacity' => 'nullable|numeric|between:0,1',
        ]);

        $slider = Slider::findOrFail($id);
        $data = $request->except(['image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slider->image_path) {
                Storage::disk('public')->delete($slider->image_path);
            }
            $imagePath = $request->file('image')->store('sliders', 'public');
            $data['image_path'] = $imagePath;
        }

        $slider->update($data);
        return redirect()->route('cms.sliders.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        
        // Delete image if exists
        if ($slider->image_path) {
            Storage::disk('public')->delete($slider->image_path);
        }
        
        $slider->delete();
        return redirect()->route('cms.sliders.index')->with('success', 'Slider deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->update(['is_active' => !$slider->is_active]);
        
        return redirect()->route('cms.sliders.index')->with('success', 'Slider status updated successfully!');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'sliders' => 'required|array',
            'sliders.*.id' => 'required|exists:sliders,id',
            'sliders.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->sliders as $sliderData) {
            Slider::where('id', $sliderData['id'])->update(['order' => $sliderData['order']]);
        }

        return response()->json(['success' => true]);
    }
}
