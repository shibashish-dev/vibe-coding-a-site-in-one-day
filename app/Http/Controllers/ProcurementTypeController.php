<?php

namespace App\Http\Controllers;

use App\Models\ProcurementType;
use Illuminate\Http\Request;

class ProcurementTypeController extends Controller
{
    public function index()
    {
        $procurementTypes = ProcurementType::all();
        return view('procurement_types.index', compact('procurementTypes'));
    }

    public function create()
    {
        return view('procurement_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        ProcurementType::create($request->only('title'));

        return redirect()->route('procurement.procurement-types.index')->with('success', 'Procurement type created successfully.');
    }

    public function show(ProcurementType $procurementType)
    {
        //
    }

    public function edit(ProcurementType $procurementType)
    {
        return view('procurement_types.edit', compact('procurementType'));
    }

    public function update(Request $request, ProcurementType $procurementType)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $procurementType->update($request->only('title'));

        return redirect()->route('procurement.procurement-types.index')->with('success', 'Procurement type updated successfully.');
    }

    public function destroy(ProcurementType $procurementType)
    {
        $procurementType->delete();

        return redirect()->route('procurement.procurement-types.index')->with('success', 'Procurement type deleted successfully.');
    }
}
