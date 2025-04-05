<?php
namespace App\Http\Controllers;

use App\Models\WhatsNew;
use Illuminate\Http\Request;

class WhatsNewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = WhatsNew::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('sort')) {
            $direction = $request->input('direction', 'desc');
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest();
        }

        $whatsNew = $query->paginate(10)->withQueryString();

        return view('whats_new.index', compact('whatsNew'));
    }

    public function create()
    {
        return view('whats_new.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'on_date' => 'required|date',
            'category' => 'required|string|max:255',
        ]);

        WhatsNew::create($request->only('title', 'on_date', 'category'));

        return redirect()->route('whats_new.index')->with('success', 'Item added.');
    }

    public function edit(WhatsNew $whatsNew)
    {
        return view('whats_new.edit', compact('whatsNew'));
    }

    public function update(Request $request, WhatsNew $whatsNew)
    {
        $request->validate([
            'title' => 'required|string',
            'on_date' => 'required|date',
            'category' => 'required|string|max:255',
        ]);

        $whatsNew->update($request->only('title', 'on_date', 'category'));

        return redirect()->route('whats_new.index')->with('success', 'Item updated.');
    }

    public function destroy(WhatsNew $whatsNew)
    {
        $whatsNew->delete();

        return redirect()->route('whats_new.index')->with('success', 'Item deleted.');
    }
}

