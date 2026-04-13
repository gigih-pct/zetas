<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RabEstimation extends Model
{
    protected $fillable = [
        'project_name',
        'building_type',
        'building_area',
        'quality_level',
        'location',
        'data_breakdown',
        'total_budget',
        'status',
    ];

    protected $casts = [
        'data_breakdown' => 'array',
        'building_area' => 'decimal:2',
        'total_budget' => 'decimal:2',
    ];
}
