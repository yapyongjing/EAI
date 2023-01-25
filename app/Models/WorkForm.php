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

    // public function aspects()
    // {
    //     return $this->hasMany(AspectImpact::class);
    // }
}
