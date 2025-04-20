<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GemItem extends Model
{
    protected $table = 'gem_items';

    protected $fillable = [
        'gem_entry_id',
        'description',
        'gem_id',
        'quantity',
        'unit',
        'amount',
    ];

    public function gem()
    {
        return $this->belongsTo(GemEntry::class, 'gem_entry_id');
    }
}
