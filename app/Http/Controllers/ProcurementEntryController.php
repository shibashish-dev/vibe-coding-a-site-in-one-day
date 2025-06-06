<?php
namespace App\Http\Controllers;

use App\Models\ProcurementEntry;
use App\Models\ProcurementUser;
use App\Models\Section;
use App\Models\ProcurementType;
use Illuminate\Http\Request;

class ProcurementEntryController extends Controller
{

    public function create()
    {
        $userId = auth()->id();

        $existing = ProcurementEntry::where('user_id', $userId)
            ->where('status', 'draft')
            ->latest()
            ->first();

        if ($existing) {
            return redirect()->route('procurement.multistep.start', ['entry' => $existing->id]);
        }

        $sections = Section::all();
        $procurementTypes = ProcurementType::all();
        $users = ProcurementUser::where('role', 'procurement_user')->get();

        return view('procurement.new-entry', compact('sections', 'procurementTypes', 'users'));
    }

    public function destroy(ProcurementEntry $entry)
    {
        $entry->delete();

        return redirect()->route('dashboard')->with('swal', [
            'icon' => 'success',
            'title' => 'Deleted',
            'text' => 'The procurement entry has been deleted successfully.'
        ]);
    }

    public function getUserDetails($id)
    {
        $user = ProcurementUser::findOrFail($id);
        return response()->json([
            'email' => $user->email,
            'telephone' => $user->phone,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:procurement_users,id',
            'section_id' => 'required|exists:sections,id',
            'procurement_type_id' => 'required|exists:procurement_types,id',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
        ]);

        $entry = ProcurementEntry::create($validated);

        return redirect()->route('procurement.multistep.start', ['entry' => $entry->id]);
    }
}
