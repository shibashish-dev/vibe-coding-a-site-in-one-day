<?php

namespace App\Http\Controllers;

use App\Models\Circular;
use Illuminate\Http\Request;

class CircularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $circulars = Circular::all();
        return view('circulars.index', compact('circulars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('circulars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'link' => 'required|url',
            'pdf_path' => 'required|mimes:pdf|max:10240',
        ]);

        $path = $request->file('pdf_path')->store('pdfs', 'public');

        Circular::create([
            'title' => $request->title,
            'type' => $request->type,
            'link' => $request->link,
            'pdf_path' => $path,
        ]);

        return redirect()->route('circulars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $circular = Circular::findOrFail($id);
        // return view('circulars.show', compact('circular'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $circular = Circular::findOrFail($id);
        return view('circulars.edit', compact('circular'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'link' => 'required|url',
        ]);

        $circular = Circular::findOrFail($id);

        $circular->update([
            'title' => $request->title,
            'type' => $request->type,
            'link' => $request->link,
        ]);

        if ($request->hasFile('pdf_path')) {
            $path = $request->file('pdf_path')->store('pdfs', 'public');
            $circular->update(['pdf_path' => $path]);
        }

        return redirect()->route('circulars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $circular = Circular::findOrFail($id);
        $circular->delete();
        return redirect()->route('circulars.index');
    }
}
