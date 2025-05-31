<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_code',
        'employee_name',
        'date',
        'entry_time',
        'exit_time',
    ];
}
