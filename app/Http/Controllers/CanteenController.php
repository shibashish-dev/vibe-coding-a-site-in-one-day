<?php

namespace App\Http\Controllers;

use App\Models\Canteen;
use Illuminate\Http\Request;
use Storage;

class CanteenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Canteen::query();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%"); // assuming 'name' is a field
        }

        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');

        if (!in_array($sortField, ['title', 'created_at'])) {
            $sortField = 'created_at';
        }

        $canteens = $query->orderBy($sortField, $sortDirection)->paginate(10)->withQueryString();

        return view('canteen.index', compact('canteens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('canteen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $path = $request->file('image')->store('images', 'public');

        Canteen::create([
            'title' => $request->title,
            'image' => $path,
        ]);


        return redirect()->route('canteen_info.index')->with('success', 'Canteen created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Canteen $canteen)
    {
        return view('canteen.show', compact('canteen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $canteen = Canteen::findOrFail($id);
        return view('canteen.edit', compact('canteen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $canteen = Canteen::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::disk('public')->delete($canteen->image);

            $path = $request->file('image')->store('images', 'public');
            $canteen->update([
                'title' => $request->title,
                'image' => $path,
            ]);
        } else {
            $canteen->update([
                'title' => $request->title,
            ]);
        }
        return redirect()->route('canteen_info.index')->with('success', 'Canteen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $canteen = Canteen::findOrFail($id);
        // Delete the image from storage
        Storage::disk('public')->delete($canteen->image);
        // Delete the canteen record from the database
        $canteen->delete();

        return redirect()->route('canteen_info.index')->with('success', 'Canteen deleted successfully.');
    }

    public function view()
    {
        $canteens = Canteen::all();
        return view('canteen.view', compact('canteens'));
    }
}
