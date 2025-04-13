<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'section_id',
        'procurement_type_id',
        'email',
        'telephone',
    ];

    public function user()
    {
        return $this->belongsTo(ProcurementUser::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function procurementType()
    {
        return $this->belongsTo(ProcurementType::class);
    }

    // Optional: Relationship with detailed forms later
    // public function vec()
    // {
    //     return $this->hasOne(VEC::class);
    // }

    // etc. for gem, indent, pac
}
