<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacEntry extends Model
{
    protected $fillable = [
        'procurement_entry_id',
        'indent_no',
        'indent_date',
        'manufacturer',
        'model',
        'justification',
        'indenting_officer',
        'approving_designation',
    ];

    public function procurementEntry()
    {
        return $this->belongsTo(ProcurementEntry::class);
    }
}

