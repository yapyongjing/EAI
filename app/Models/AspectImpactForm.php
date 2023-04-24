<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspectImpactForm extends Model
{
    use HasFactory;

    public function workForm()
    {
        return $this->belongsTo(WorkForm::class,'work_form_id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
