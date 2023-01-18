<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingUnit extends Model
{
    use HasFactory;

    protected $fillable = ['opr_name'];

    public function mainWorks()
    {
        return $this->hasMany(Main_Work::class);
    }
}
