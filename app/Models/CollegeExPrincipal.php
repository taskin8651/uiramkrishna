<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollegeExPrincipal extends Model
{
    protected $fillable = [
        'sort_order',
        'name',
        'post_type',
        'period',
        'is_current',
        'status',
    ];

    protected $casts = [
        'is_current' => 'boolean',
        'status'     => 'boolean',
    ];

    public function getPostLabelAttribute()
    {
        return $this->post_type === 'incharge' ? 'Incharge' : 'Principal';
    }

    public function getBadgeClassAttribute()
    {
        if ($this->is_current) {
            return 'current';
        }

        return $this->post_type === 'incharge' ? 'incharge' : 'principal';
    }
}