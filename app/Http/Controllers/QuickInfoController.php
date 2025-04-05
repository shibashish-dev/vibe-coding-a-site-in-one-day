<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuickInfo;
use Illuminate\Http\Request;

class QuickInfoController extends Controller
{
    public function index(Request $request)
    {
        $query = QuickInfo::query();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');

        if (!in_array($sortField, ['title', 'created_at'])) {
            $sortField = 'created_at';
        }

        $quickInfos = $query->orderBy($sortField, $sortDirection)->paginate(10)->withQueryString();

        return view('quick_infos.index', compact('quickInfos'));
    }

    public function create()
    {
        return view('quick_infos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
        ]);

        QuickInfo::create($request->all());

        return redirect()->route('quick_infos.index')->with('success', 'Quick Info created successfully.');
    }

    public function edit(QuickInfo $quickInfo)
    {
        return view('quick_infos.edit', compact('quickInfo'));
    }

    public function update(Request $request, QuickInfo $quickInfo)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
        ]);

        $quickInfo->update($request->all());

        return redirect()->route('quick_infos.index')->with('success', 'Quick Info updated successfully.');
    }

    public function destroy(QuickInfo $quickInfo)
    {
        $quickInfo->delete();
        return redirect()->route('quick_infos.index')->with('success', 'Quick Info deleted successfully.');
    }
}
