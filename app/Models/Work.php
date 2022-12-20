<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['fkey','work_name','con'];

    public function main_Works()
    {
        return $this->belongsTo(Main_Work::class);
    }

    public function aspects()
    {
        return $this->hasMany(Aspect_Impact::class);
    }
}
