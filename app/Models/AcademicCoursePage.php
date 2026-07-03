<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCoursePage extends Model
{
    protected $fillable = [
        'slug',
        'css_prefix',
        'kicker_text',
        'hero_title',
        'hero_description',
        'summary_label',
        'summary_title',
        'summary_description',
        'summary_stats',
        'note_title',
        'note_description',
        'panel_label',
        'panel_title',
        'button_text',
        'button_url',
        'table_label',
        'table_title',
        'download_button_text',
        'download_button_url',
        'status',
    ];

    protected $casts = [
        'summary_stats' => 'array',
        'status'        => 'boolean',
    ];

    public function courses()
    {
        return $this->hasMany(AcademicCourse::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function activeCourses()
    {
        return $this->hasMany(AcademicCourse::class)
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function helpCards()
    {
        return $this->hasMany(AcademicHelpCard::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function activeHelpCards()
    {
        return $this->hasMany(AcademicHelpCard::class)
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}