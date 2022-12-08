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
        return $this->belongsTo('App\Models\Operating_Unit');
    }

    public function works()
    {
        return $this->hasMany('App\Models\Work');
    }
}
