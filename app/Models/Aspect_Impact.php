<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspect_Impact extends Model
{
    use HasFactory;
    protected $fillable = ['aspect','impact','fkey'];

    public function works_aspect()
    {
        return $this->belongsTo(Work::class);
    }
}
