<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name',
        'land_price_ref',
        'material_multiplier',
        'labor_multiplier',
        'notes',
    ];
}
