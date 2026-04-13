<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    protected $fillable = [
        'name',
        'serial_plate',
        'type',
        'location',
        'status',
        'usage_value',
        'usage_unit'
    ];
}
