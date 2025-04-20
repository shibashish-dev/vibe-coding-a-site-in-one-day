<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndentPartOneItem extends Model
{
    protected $fillable = [
        'indent_part_one_form_id',
        'description',
        'quantity',
        'unit',
        'estimated_cost'
    ];

    public function form()
    {
        return $this->belongsTo(IndentPartOneForm::class, 'indent_part_one_form_id');
    }
}
