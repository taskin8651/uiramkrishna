<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollegeVisionMissionPage extends Model
{
    protected $fillable = [
        'vision_title',
        'vision_description',
        'vision_highlight',
        'vision_points',
        'mission_title',
        'mission_description',
        'mission_highlight',
        'mission_points',
        'status',
    ];

    protected $casts = [
        'vision_points'  => 'array',
        'mission_points' => 'array',
        'status'         => 'boolean',
    ];
}