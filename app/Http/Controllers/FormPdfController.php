<?php

namespace App\Http\Controllers;

use App\Models\FormPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormPdfController extends Controller
{
    public function index(Request $request)
    {
        $query = FormPdf::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');

        $formPdfs = $query->orderBy($sort, $direction)->paginate(10);

        return view('form_pdfs.index', compact('formPdfs'));
    }


    public function create()
    {
        return view('form_pdfs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'required|mimes:pdf|max:5120',
        ]);

        $data = ['title' => $validated['title']];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('pdf')) {
            $data['pdf_path'] = $request->file('pdf')->store('pdfs', 'public');
        }

        FormPdf::create($data);

        return redirect()->route('form_pdfs.index')->with('success', 'Form PDF created successfully.');
    }

    public function edit(FormPdf $formPdf)
    {
        return view('form_pdfs.edit', compact('formPdf'));
    }

    public function update(Request $request, FormPdf $formPdf)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = ['title' => $validated['title']];

        if ($request->hasFile('thumbnail')) {
            if ($formPdf->thumbnail) {
                Storage::disk('public')->delete($formPdf->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('pdf')) {
            Storage::disk('public')->delete($formPdf->pdf_path);
            $data['pdf_path'] = $request->file('pdf')->store('pdfs', 'public');
        }

        $formPdf->update($data);

        return redirect()->route('form_pdfs.index')->with('success', 'Form PDF updated successfully.');
    }

    public function destroy(FormPdf $formPdf)
    {
        $formPdf->delete();
        return redirect()->route('form_pdfs.index')->with('success', 'Form PDF deleted successfully.');
    }

    public function view(Request $request)
    {
        $search = $request->input('search');

        $formPdfs = FormPdf::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->paginate(8);

        return view('form_pdfs.view', compact('formPdfs'));
    }
}
