<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GemEntry extends Model
{
    protected $table = 'gem_entries';

    protected $fillable = [
        'procurement_entry_id',
        'section',
        'indent_no',
        'date',
        'officer_name',
        'designation',
        'budget_head',
        'indenting_officer',
        'section_head',
        'manager',
        'OSD',
        'gem_approval',

        // Payment Approval Fields
        'gem_contract_date',
        'due_delivery_date',
        'receipt_date',
        'delivery_date_extension',
        'with_ld',
        'without_ld',
        'delivery_extension_justification',
        'crac_date',
        'inspection_remarks',
        'other_remarks',
        'pao_aao',
    ];

    public function items()
    {
        return $this->hasMany(GemItem::class, 'gem_entry_id');
    }

    public function procurementEntry()
    {
        return $this->belongsTo(ProcurementEntry::class);
    }
}
