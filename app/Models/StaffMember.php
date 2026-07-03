<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class StaffMember extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'department_id',
        'staff_type',
        'sort_order',
        'name',
        'designation',
        'designation_type',
        'qualification',
        'email',
        'phone',
        'bio',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('staff_image')->singleFile();
    }

    public function getStaffImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('staff_image') ?: null;
    }

    public function getBadgeClassAttribute(): string
    {
        return match ($this->designation_type) {
            'principal' => 'principal',
            'professor' => 'professor',
            'associate' => 'associate',
            'assistant' => 'assistant',
            'guest' => 'guest',
            default => 'staff',
        };
    }

    public function scopeTeaching($query)
    {
        return $query->where('staff_type', 'teaching');
    }

    public function scopeNonTeaching($query)
    {
        return $query->where('staff_type', 'non_teaching');
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