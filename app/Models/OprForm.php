<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OprForm extends Model
{
    use HasFactory;

    protected $fillable = ['operating_name','location_name'];

    public function works()
    {
        return $this->hasMany(WorkForm::class);
    }
}
