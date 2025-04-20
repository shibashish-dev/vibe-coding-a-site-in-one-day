<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndentPartThree extends Model
{
    protected $fillable = [
        'procurement_entry_id',
        'split_quantity',
        'prebid_meeting',
        'sample_required',
        'fim_involved',
        'fim_available',
        'fim_description',
        'fim_quantity',
        'fim_value',
        'fim_loss',
        'fim_rejection_deduction',
        'buy_back',
        'post_supply_inspection',
        'store_availability',
        'request_to_dps',
        'indenting_officer',
        'indenting_unit',
        'indenting_phone',
        'indenting_email',
        'approving_authority',
        'approving_phone',
        'approving_email',
    ];

    public function procurementEntry()
    {
        return $this->belongsTo(ProcurementEntry::class, 'procurement_entry_id');
    }
}
