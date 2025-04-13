<?php
namespace App\Http\Controllers;

use App\Models\ProcurementEntry;
use Illuminate\Http\Request;

class ProcurementMultistepController extends Controller
{
    public function start(ProcurementEntry $entry)
    {
        return view('procurement.multistep', compact('entry'));
    }

    public function store(Request $request)
    {
        // Handle storing all forms in DB (we’ll build this after getting the fields)
        // You can save $request->all() to a `ProcurementSubmission` model later

        // Example:
        // ProcurementSubmission::create([...]);

        return redirect()->route('procurement.dashboard')->with('success', 'Submission saved.');
    }
}
