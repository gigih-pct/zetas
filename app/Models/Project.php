<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'address',
        'sector',
        'node_id',
        'progress',
        'status',
        'priority',
        'milestone_name',
        'milestone_date',
        'milestone_status',
        'team_size',
        'is_highlighted'
    ];
}
