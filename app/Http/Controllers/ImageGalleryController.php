<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'created_at');
        $direction = $request->input('direction', 'desc');

        $imageGalleries = ImageGallery::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%");
            })
            ->orderBy($sort, $direction)
            ->paginate(10);

        return view('image_galleries.index', compact('imageGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('image_galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // Max size: 2MB
        ]);

        $path = $request->file('image')->store('images', 'public');

        ImageGallery::create([
            'title' => $request->title,
            'image' => $path,
        ]);

        return redirect()->route('image_galleries.index')->with('success', 'Image uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImageGallery $imageGallery)
    {
        return view('image_galleries.edit', compact('imageGallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImageGallery $imageGallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Max size: 2MB
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::disk('public')->delete($imageGallery->image);

            $path = $request->file('image')->store('images', 'public');
            $imageGallery->update([
                'title' => $request->title,
                'image' => $path,
            ]);
        } else {
            $imageGallery->update([
                'title' => $request->title,
            ]);
        }

        return redirect()->route('image_galleries.index')->with('success', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageGallery $imageGallery)
    {
        Storage::disk('public')->delete($imageGallery->image);
        $imageGallery->delete();

        return redirect()->route('image_galleries.index')->with('success', 'Image deleted successfully.');
    }
}
