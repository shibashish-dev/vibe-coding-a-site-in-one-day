<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndentPartOneForm extends Model
{
    protected $fillable = [
        'procurement_entry_id',
        'user_unit',
        'indent_type',
        'desired_delivery',
        'indenting_officer',
        'designation',
        'group_division_section',
        'email_contact',
        'place_of_delivery',
        'approving_authority_name',
        'approving_authority_designation',
        'approving_authority_email',
        'declaration_text',
        'total_estimated_cost_words',
        'classification',
        'previous_purchase_ref',
        'financial_sanction',
        'budget_head',
        'other_info',
        'proposed_vendors'
    ];

    public function items()
    {
        return $this->hasMany(IndentPartOneItem::class);
    }

    public function procurementEntry()
    {
        return $this->belongsTo(ProcurementEntry::class);
    }
}
