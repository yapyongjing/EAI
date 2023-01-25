<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspect_Impact extends Model
{
    use HasFactory;
    protected $fillable = ['aspect','impact','rqm','fkey'];

    public function workAspect()
    {
        return $this->belongsTo(Work::class,'work_id');
    }
}
