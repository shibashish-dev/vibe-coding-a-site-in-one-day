<?php

namespace App\Http\Controllers;

use App\Models\Circular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CircularController extends Controller
{
    public function index(Request $request)
    {
        $query = Circular::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');

        $circulars = $query->orderBy($sortField, $sortDirection)->paginate(10)->appends($request->query());

        return view('circulars.index', compact('circulars'));
    }


    public function create()
    {
        return view('circulars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:pdf,link',
            'link' => 'required_if:type,link|nullable|url',
            'pdf' => 'required_if:type,pdf|nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'title' => $validated['title'],
            'type' => $validated['type'],
            'link' => $validated['link'] ?? null,
        ];

        if ($request->file('pdf')) {
            $path = $request->file('pdf')->store('pdfs', 'public');
            $data['pdf_path'] = $path;
        }

        Circular::create($data);

        return redirect()->route('circulars.index')->with('success', 'Circular created successfully.');
    }

    public function edit(Circular $circular)
    {
        return view('circulars.edit', compact('circular'));
    }

    public function update(Request $request, Circular $circular)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:pdf,link',
            'link' => 'required_if:type,link|nullable|url',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'title' => $validated['title'],
            'type' => $validated['type'],
            'link' => $validated['link'] ?? null,
        ];

        if ($request->file('pdf')) {
            if ($circular->pdf_path) {
                Storage::disk('public')->delete($circular->pdf_path);
            }
            $data['pdf_path'] = $request->file('pdf')->store('pdfs', 'public');
        }

        $circular->update($data);

        return redirect()->route('circulars.index')->with('success', 'Circular updated successfully.');
    }

    public function destroy(Circular $circular)
    {
        if ($circular->pdf_path) {
            Storage::disk('public')->delete($circular->pdf_path);
        }

        $circular->delete();
        return redirect()->route('circulars.index')->with('success', 'Circular deleted.');
    }
}
