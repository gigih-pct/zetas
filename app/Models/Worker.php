<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'registration_id',
        'name',
        'position',
        'security_level',
        'sector',
        'efficiency',
        'contact'
    ];
}
