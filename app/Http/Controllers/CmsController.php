<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CmsController extends Controller
{
    public function index()
    {
        return view('cms.index');
    }

    public function pages()
    {
        $pages = Page::latest()->paginate(10);
        return view('cms.pages.index', compact('pages'));
    }

    public function createPage()
    {
        return view('cms.pages.create');
    }

    public function storePage(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('pages', 'public');
            $data['featured_image'] = $imagePath;
        }

        Page::create($data);
        return redirect()->route('cms.pages')->with('success', 'Page created successfully!');
    }

    public function editPage($id)
    {
        $page = Page::findOrFail($id);
        return view('cms.pages.edit', compact('page'));
    }

    public function updatePage(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $id,
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $page = Page::findOrFail($id);
        $data = $request->all();
        
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($page->featured_image) {
                Storage::disk('public')->delete($page->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('pages', 'public');
            $data['featured_image'] = $imagePath;
        }

        $page->update($data);
        return redirect()->route('cms.pages')->with('success', 'Page updated successfully!');
    }

    public function deletePage($id)
    {
        $page = Page::findOrFail($id);
        
        // Delete featured image if exists
        if ($page->featured_image) {
            Storage::disk('public')->delete($page->featured_image);
        }
        
        $page->delete();
        return redirect()->route('cms.pages')->with('success', 'Page deleted successfully!');
    }

    public function media()
    {
        return view('cms.media.index');
    }

    public function uploadMedia(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:10240'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/media', $filename);
            
            return response()->json([
                'success' => true,
                'filename' => $filename,
                'path' => Storage::url($path)
            ]);
        }

        return response()->json(['success' => false], 400);
    }
}
