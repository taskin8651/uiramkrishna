<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCourse extends Model
{
    protected $fillable = [
        'academic_course_page_id',
        'sort_order',
        'icon_class',
        'stream_label',
        'course_name',
        'description',
        'duration',
        'eligibility',
        'type_label',
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