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
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(ProcurementUser::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function type()
    {
        return $this->belongsTo(ProcurementType::class);
    }

    public function procurementType()
    {
        return $this->belongsTo(ProcurementType::class);
    }

    public function vec()
    {
        return $this->hasOne(VEC::class);
    }

    public function gem()
    {
        return $this->hasOne(GemEntry::class);
    }

    public function indentPartOne()
    {
        return $this->hasOne(IndentPartOneForm::class);
    }

    public function indentPartTwo()
    {
        return $this->hasOne(IndentPartTwo::class);
    }

    public function indentPartThree()
    {
        return $this->hasOne(IndentPartThree::class);
    }

    public function pac()
    {
        return $this->hasOne(PacEntry::class);
    }


}
