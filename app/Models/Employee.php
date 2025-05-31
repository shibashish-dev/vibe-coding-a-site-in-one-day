<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'ic_number',
        'section',
        'employee_name',
    ];

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
