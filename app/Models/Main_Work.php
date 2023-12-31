<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_Work extends Model
{
    use HasFactory;

    protected $fillable = ['location','name'];

    public function opr()
    {
        return $this->belongsTo(Operating_Unit::class,'opr_id');
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
