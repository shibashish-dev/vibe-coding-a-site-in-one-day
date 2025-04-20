<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VECItem extends Model
{
    protected $table = 'vec_items';

    protected $fillable = [
        'vec_entry_id',
        'description',
        'unit',
        'qty_installed',
        'consumption_rate',
        'stock_position',
        'qty_pipeline',
        'indented_qty',
    ];

    public function vec()
    {
        return $this->belongsTo(VEC::class, 'vec_entry_id');
    }
}
