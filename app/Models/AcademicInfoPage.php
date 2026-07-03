<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicInfoPage extends Model
{
    protected $fillable = [
        'slug',
        'kicker_text',
        'hero_title',
        'hero_description',
        'section_label',
        'section_title',
        'section_description',
        'cards',
        'table_rows',
        'status',
    ];

    protected $casts = [
        'cards'      => 'array',
        'table_rows' => 'array',
        'status'     => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}