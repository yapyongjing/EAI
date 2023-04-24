<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function aspect()
    {
        return $this->belongsTo(AspectImpactForm::class,'aspect_impact_form_id');
    }

}
