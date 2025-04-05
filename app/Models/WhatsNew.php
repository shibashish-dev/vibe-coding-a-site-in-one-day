<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhatsNew extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'whats_new';


    protected $fillable = [
        'title',
        'on_date',
        'category',
    ];

    // protected $casts = [
    //     'date' => ''
    // ]
}
