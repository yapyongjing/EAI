<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['fkey','work_name','con'];

    public function mainWork()
    {
        return $this->belongsTo(Main_Work::class,'mainWork_id');
    }

    public function aspects()
    {
        return $this->hasMany(Aspect_Impact::class,'work_id');
    }
}
