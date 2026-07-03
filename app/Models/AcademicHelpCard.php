<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicHelpCard extends Model
{
    protected $fillable = [
        'academic_course_page_id',
        'sort_order',
        'icon_class',
        'title',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(AcademicCoursePage::class, 'academic_course_page_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}