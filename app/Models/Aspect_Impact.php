<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspect_Impact extends Model
{
    use HasFactory;

    public function works_aspect()
    {
        return $this->belongsTo('App\Models\Work');
    }
}
