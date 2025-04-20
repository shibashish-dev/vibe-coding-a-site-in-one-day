<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndentPartTwo extends Model
{
    protected $fillable = [
        'procurement_entry_id',
        'total_estimated_cost',
        'basic_cost',
        'packing_forwarding',
        'custom_duty',
        'gst_basic',
        'transportation',
        'installation',
        'training',
        'gst_f_g',
        'other_charges',
        'item_category',
        'technical_category',
        'developmental_in_india',
        'gem_product_available',
        'gem_additional_parameters',
        'gem_report_upload',
        'gem_list',
        'mse_reserved_list',
        'gte_exempted_list',
        'mii_reserved_list',
        'is_proprietary',
        'evaluation_basis',
        'bidder_qualification_criteria',
        'financial_criteria_approval',
        'bid_evaluation_criteria',
        'acceptance_criteria',
        'is_warranty',
        'warranty_period',
        'warranty_psd',
        'is_pdi',
        'installation_scope',
        'site_ready',
        'training_required',
        'training_place',
        'training_personnel',
        'training_days',
        'mse_experience_exemption',
        'mse_turnover_exemption',
        'payment_terms',
        'advance_milestone_details',
        'pro_rata_details',
        'is_for_rnd',
        'is_imported',
        'local_content_percent',
        'project_validity',
        'site_visit_approval',
        'evaluation_time',
        'indenting_officer',
        'indenting_unit',
        'indenting_phone',
        'indenting_email',
        'approving_authority',
        'approving_phone',
        'approving_email'
    ];

    public function procurementEntry()
    {
        return $this->belongsTo(ProcurementEntry::class);
    }

}
