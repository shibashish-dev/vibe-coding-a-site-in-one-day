<?php
namespace App\Http\Controllers;

use App\Models\GemEntry;
use App\Models\IndentPartOneForm;
use App\Models\IndentPartThree;
use App\Models\IndentPartTwo;
use App\Models\PacEntry;
use App\Models\ProcurementEntry;
use App\Models\VEC;
use Illuminate\Http\Request;
use App\Models\VECItem;


class ProcurementMultistepController extends Controller
{
    public function start(ProcurementEntry $entry)
    {
        $entry->load('vec.items');
        $entry->load('gem.items');
        $entry->load('indentPartOne.items');
        return view('procurement.multistep', compact('entry'));
    }

    public function store(Request $request)
    {
        return redirect()->route('procurement.dashboard')->with('success', 'Submission saved.');
    }


    public function storeVec(Request $request, ProcurementEntry $entry)
    {
        $validated = $request->validate([
            'description' => 'nullable|string',
            'functional_requirement' => 'nullable|string',
            'equipment_cost' => 'nullable|string',
            'nature_item_maintenance' => 'nullable|string',
            'nature_item_consumables' => 'nullable|string',
            'nature_item_origin' => 'nullable|string',
            'additional_info' => 'nullable|string',
            'quantity_other_hwps' => 'nullable|string',
            'min_max_stock' => 'nullable|string',
            'indented_qty_and_efforts' => 'nullable|string',
            'expected_delivery' => 'nullable|string',
            'usage_period' => 'nullable|string',
            'prev_supplier' => 'nullable|string',
            'prev_cost_year' => 'nullable|string',
            'prev_qty' => 'nullable|string',
            'supplier_suggestion' => 'nullable|string',
            'cost_justification' => 'nullable|string',
            'budget_provision' => 'nullable|string',
        ]);

        $vec = VEC::updateOrCreate(
            ['procurement_entry_id' => $entry->id],
            $validated
        );

        $vec->items()->delete();

        if ($request->has('items')) {
            foreach ($request->input('items') as $item) {
                $vec->items()->create([
                    'description' => $item['description'] ?? null,
                    'unit' => $item['unit'] ?? null,
                    'qty_installed' => $item['qty_installed'] ?? null,
                    'consumption_rate' => $item['consumption_rate'] ?? null,
                    'stock_position' => $item['stock_position'] ?? null,
                    'qty_pipeline' => $item['qty_pipeline'] ?? null,
                    'indented_qty' => $item['indented_qty'] ?? null,
                ]);
            }
        }

        return redirect()->back()->with('success', 'VEC section saved successfully.');
    }

    public function storeGem(Request $request, ProcurementEntry $entry)
    {
        $validated = $request->validate([
            'section' => 'nullable|string',
            'indent_no' => 'nullable|string',
            'date' => 'nullable|string',
            'officer_name' => 'nullable|string',
            'designation' => 'nullable|string',
            'budget_head' => 'nullable|string',
            'indenting_officer' => 'nullable|string',
            'section_head' => 'nullable|string',
            'manager' => 'nullable|string',
            'OSD' => 'nullable|string',
            'gem_approval' => 'nullable|string',
            'gem_contract_date' => 'nullable|string',
            'due_delivery_date' => 'nullable|string',
            'receipt_date' => 'nullable|string',
            'delivery_date_extension' => 'nullable|string',
            'with_ld' => 'nullable|boolean',
            'without_ld' => 'nullable|boolean',
            'delivery_extension_justification' => 'nullable|string',
            'crac_date' => 'nullable|string',
            'inspection_remarks' => 'nullable|string',
            'other_remarks' => 'nullable|string',
            'pao_aao' => 'nullable|string',
        ]);

        $gem = GemEntry::updateOrCreate(
            ['procurement_entry_id' => $entry->id],
            $validated
        );


        $gem->items()->delete();

        if ($request->has('items')) {
            foreach ($request->input('items') as $item) {
                $gem->items()->create([
                    'description' => $item['description'] ?? null,
                    'gem_id' => $item['gem_id'] ?? null,
                    'quantity' => $item['quantity'] ?? null,
                    'unit' => $item['unit'] ?? null,
                    'amount' => $item['amount'] ?? null,
                ]);
            }
        }

        return redirect()->back()->with('success', 'GEM section saved successfully.');
    }

    public function storeIndentOne(Request $request, ProcurementEntry $entry)
    {
        $validated = $request->validate([
            'user_unit' => 'nullable|string',
            'indent_type' => 'nullable|string',
            'desired_delivery' => 'nullable|string',

            'indenting_officer' => 'nullable|string',
            'designation' => 'nullable|string',

            'group_division_section' => 'nullable|string',
            'email_contact' => 'nullable|string',
            'place_of_delivery' => 'nullable|string',

            'approving_authority_name' => 'nullable|string',
            'approving_authority_designation' => 'nullable|string',
            'approving_authority_email' => 'nullable|string',

            'total_estimated_cost_words' => 'nullable|string',
            'classification' => 'nullable|string',
            'previous_purchase_ref' => 'nullable|string',
            'financial_sanction' => 'nullable|string',
            'budget_head' => 'nullable|string',
            'other_info' => 'nullable|string',
            'proposed_vendors' => 'nullable|string',
        ]);

        $form = IndentPartOneForm::updateOrCreate(
            ['procurement_entry_id' => $entry->id],
            $validated
        );

        $form->items()->delete();

        if ($request->has('items')) {
            foreach ($request->input('items') as $item) {
                $form->items()->create([
                    'description' => $item['description'] ?? null,
                    'quantity' => $item['quantity'] ?? null,
                    'unit' => $item['unit'] ?? null,
                    'estimated_cost' => $item['estimated_cost'] ?? null,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Indent Part-I section saved successfully.');
    }

    public function storeIndentTwo(Request $request, ProcurementEntry $entry)
    {
        $validated = $request->validate([
            'total_estimated_cost' => 'nullable|string',
            'basic_cost' => 'nullable|string',
            'packing_forwarding' => 'nullable|string',
            'custom_duty' => 'nullable|string',
            'gst_basic' => 'nullable|string',
            'transportation' => 'nullable|string',
            'installation' => 'nullable|string',
            'training' => 'nullable|string',
            'gst_f_g' => 'nullable|string',
            'other_charges' => 'nullable|string',

            'item_category' => 'nullable|string',
            'technical_category' => 'nullable|string',
            'developmental_in_india' => 'nullable|string',

            'gem_product_available' => 'nullable|string',
            'gem_additional_parameters' => 'nullable|string',
            'gem_report_upload' => 'nullable|file',

            'gem_list' => 'nullable|string',
            'mse_reserved_list' => 'nullable|string',
            'gte_exempted_list' => 'nullable|string',
            'mii_reserved_list' => 'nullable|string',

            'is_proprietary' => 'nullable|string',
            'evaluation_basis' => 'nullable|string',
            'bidder_qualification_criteria' => 'nullable|string',
            'financial_criteria_approval' => 'nullable|string',
            'bid_evaluation_criteria' => 'nullable|string',
            'acceptance_criteria' => 'nullable|string',

            'is_warranty' => 'nullable|string',
            'warranty_period' => 'nullable|string',
            'warranty_psd' => 'nullable|string',

            'is_pdi' => 'nullable|string',
            'installation_scope' => 'nullable|string',
            'site_ready' => 'nullable|string',

            'training_required' => 'nullable|string',
            'training_place' => 'nullable|string',
            'training_personnel' => 'nullable|string',
            'training_days' => 'nullable|string',

            'mse_experience_exemption' => 'nullable|string',
            'mse_turnover_exemption' => 'nullable|string',
            'payment_terms' => 'nullable|string',
            'advance_milestone_details' => 'nullable|string',
            'pro_rata_details' => 'nullable|string',
            'is_for_rnd' => 'nullable|string',
            'is_imported' => 'nullable|string',
            'local_content_percent' => 'nullable|string',
            'project_validity' => 'nullable|string',
            'site_visit_approval' => 'nullable|string',
            'evaluation_time' => 'nullable|string',

            'indenting_officer' => 'nullable|string',
            'indenting_unit' => 'nullable|string',
            'indenting_phone' => 'nullable|string',
            'indenting_email' => 'nullable|string',

            'approving_authority' => 'nullable|string',
            'approving_phone' => 'nullable|string',
            'approving_email' => 'nullable|string',
        ]);

        if ($request->hasFile('gem_report_upload')) {
            $file = $request->file('gem_report_upload');
            $path = $file->store('uploads/gem_reports', 'public');
            $validated['gem_report_upload'] = $path;
        }

        $validated['procurement_entry_id'] = $entry->id;

        IndentPartTwo::updateOrCreate(
            ['procurement_entry_id' => $entry->id],
            $validated
        );

        return redirect()->back()->with('success', 'Indent Part-II section saved successfully.');
    }

    public function storeIndentThree(Request $request, ProcurementEntry $entry)
    {
        $validated = $request->validate([
            'split_quantity' => 'nullable|string',
            'prebid_meeting' => 'nullable|string',
            'sample_required' => 'nullable|string',
            'fim_involved' => 'nullable|string',
            'fim_available' => 'nullable|string',
            'fim_description' => 'nullable|string',
            'fim_quantity' => 'nullable|string',
            'fim_value' => 'nullable|string',
            'fim_loss' => 'nullable|string',
            'fim_rejection_deduction' => 'nullable|string',
            'buy_back' => 'nullable|string',
            'post_supply_inspection' => 'nullable|string',
            'store_availability' => 'nullable|string',
            'request_to_dps' => 'nullable|string',
            'indenting_officer' => 'nullable|string',
            'indenting_unit' => 'nullable|string',
            'indenting_phone' => 'nullable|string',
            'indenting_email' => 'nullable|email',
            'approving_authority' => 'nullable|string',
            'approving_phone' => 'nullable|string',
            'approving_email' => 'nullable|email',
        ]);

        IndentPartThree::updateOrCreate(
            ['procurement_entry_id' => $entry->id],
            $validated
        );

        return redirect()->back()->with('success', 'Indent Part-III section saved successfully.');
    }

    public function storePac(Request $request, ProcurementEntry $entry)
    {
        $validated = $request->validate([
            'indent_no' => 'nullable|string',
            'indent_date' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'model' => 'nullable|string',
            'justification' => 'nullable|string',
            'indenting_officer' => 'nullable|string',
            'approving_designation' => 'nullable|string',
        ]);

        PacEntry::updateOrCreate(
            ['procurement_entry_id' => $entry->id],
            $validated
        );

        return redirect()->back()->with('success', 'PAC section saved successfully.');
    }


    public function preview(ProcurementEntry $entry)
    {

        $entry->load([
            'user',
            'section',
            'procurementType',
            'vec.items',
            'gem.items',
            'indentPartOne.items',
            'indentPartTwo',
            'indentPartThree',
            'pac'
        ]);

        return view('procurement.preview', compact('entry'));
    }

    public function submitAndPrint(Request $request, ProcurementEntry $entry)
    {
        $entry->update(['status' => 'completed']);

        return redirect()->route('procurement.dashboard')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Submission Complete',
                'text' => 'Procurement entry #' . $entry->id . ' has been successfully submitted!'
            ]);
    }

}
