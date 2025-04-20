<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VEC extends Model
{
    protected $table = 'vec_entries'; // 👈 Fixes the table name

    protected $fillable = [
        'procurement_entry_id',
        'description',
        'functional_requirement',
        'equipment_cost',
        'nature_item_maintenance',
        'nature_item_consumables',
        'nature_item_origin',
        'additional_info',
        'quantity_other_hwps',
        'min_max_stock',
        'indented_qty_and_efforts',
        'expected_delivery',
        'usage_period',
        'prev_supplier',
        'prev_cost_year',
        'prev_qty',
        'supplier_suggestion',
        'cost_justification',
        'budget_provision',
    ];

    public function items()
    {
        return $this->hasMany(VECItem::class, 'vec_entry_id');
    }

    public function procurementEntry()
    {
        return $this->belongsTo(ProcurementEntry::class);
    }
}
