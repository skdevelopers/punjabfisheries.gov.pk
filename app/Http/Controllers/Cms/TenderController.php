<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenders = Tender::latest()->paginate(10);
        return view('cms.tenders.index', compact('tenders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.tenders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tender_number' => 'required|string|max:100|unique:tenders,tender_number',
            'deadline' => 'required|date|after:today',
            'status' => 'required|in:active,closed,cancelled',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240', // 10MB max
            'pdf_file_2' => 'nullable|file|mimes:pdf|max:10240' // 10MB max
        ]);

        $data = $request->except(['pdf_file', 'pdf_file_2']);
        $data['is_published'] = true; // Auto-publish tenders
        $data['published_at'] = now();

        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('tenders', 'public');
            $data['pdf_path'] = $pdfPath;
        }

        if ($request->hasFile('pdf_file_2')) {
            $pdfPath2 = $request->file('pdf_file_2')->store('tenders', 'public');
            $data['pdf_path_2'] = $pdfPath2;
        }

        Tender::create($data);
        return redirect()->route('cms.tenders.index')->with('success', 'Tender created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tender = Tender::findOrFail($id);
        return view('cms.tenders.show', compact('tender'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tender = Tender::findOrFail($id);
        return view('cms.tenders.edit', compact('tender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tender = Tender::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tender_number' => 'required|string|max:100|unique:tenders,tender_number,' . $id,
            'deadline' => 'required|date',
            'status' => 'required|in:active,closed,cancelled',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'pdf_file_2' => 'nullable|file|mimes:pdf|max:10240'
        ]);

        $data = $request->except(['pdf_file', 'pdf_file_2']);
        $data['is_published'] = true; // Auto-publish tenders
        $data['published_at'] = now();

        if ($request->hasFile('pdf_file')) {
            // Delete old PDF if exists
            if ($tender->pdf_path) {
                Storage::disk('public')->delete($tender->pdf_path);
            }
            $pdfPath = $request->file('pdf_file')->store('tenders', 'public');
            $data['pdf_path'] = $pdfPath;
        }

        if ($request->hasFile('pdf_file_2')) {
            // Delete old PDF 2 if exists
            if ($tender->pdf_path_2) {
                Storage::disk('public')->delete($tender->pdf_path_2);
            }
            $pdfPath2 = $request->file('pdf_file_2')->store('tenders', 'public');
            $data['pdf_path_2'] = $pdfPath2;
        }

        $tender->update($data);
        return redirect()->route('cms.tenders.index')->with('success', 'Tender updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tender = Tender::findOrFail($id);
        
        // Delete PDFs if exist
        if ($tender->pdf_path) {
            Storage::disk('public')->delete($tender->pdf_path);
        }
        if ($tender->pdf_path_2) {
            Storage::disk('public')->delete($tender->pdf_path_2);
        }
        
        $tender->delete();
        return redirect()->route('cms.tenders.index')->with('success', 'Tender deleted successfully!');
    }

    /**
     * Toggle publication status
     */
    public function toggleStatus(string $id)
    {
        $tender = Tender::findOrFail($id);
        
        if ($tender->is_published) {
            $tender->unpublish();
            $message = 'Tender unpublished successfully!';
        } else {
            $tender->publish();
            $message = 'Tender published successfully!';
        }
        
        return redirect()->route('cms.tenders.index')->with('success', $message);
    }

    /**
     * Download PDF
     */
    public function downloadPdf(string $id)
    {
        $tender = Tender::findOrFail($id);
        
        if (!$tender->pdf_path || !Storage::disk('public')->exists($tender->pdf_path)) {
            return redirect()->back()->with('error', 'PDF file not found.');
        }
        
        return response()->download(storage_path('app/public/' . $tender->pdf_path), $tender->tender_number . '.pdf');
    }

    /**
     * Download PDF 2
     */
    public function downloadPdf2(string $id)
    {
        $tender = Tender::findOrFail($id);
        
        if (!$tender->pdf_path_2 || !Storage::disk('public')->exists($tender->pdf_path_2)) {
            return redirect()->back()->with('error', 'PDF file not found.');
        }
        
        return response()->download(storage_path('app/public/' . $tender->pdf_path_2), $tender->tender_number . '_2.pdf');
    }
}
