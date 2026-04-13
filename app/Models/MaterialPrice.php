<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialPrice extends Model
{
    protected $fillable = [
        'category',
        'name',
        'unit',
        'min_price',
        'max_price',
    ];
}
