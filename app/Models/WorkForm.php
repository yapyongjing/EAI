<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkForm extends Model
{
    use HasFactory;

    protected $fillable = ['fkey','work_name','con'];

    public function oprForm()
    {
        return $this->belongsTo(OprForm::class,'opr_form_id');
    }

    public function aspects()
    {
        return $this->hasMany(AspectImpactForm::class);
    }

    public function ratings()
    {
        return $this->hasManyThrough(Rating::class,AspectImpactForm::class);
    }

    public function risks()
    {
        return $this->hasManyThrough(RiskControl::class,AspectImpactForm::class);
    }
}
