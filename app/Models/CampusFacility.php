<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CampusFacility extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'slug',
        'css_prefix',
        'image_alt',
        'image_title',
        'image_description',
        'panel_title',
        'lead_description',
        'features',
        'status',
    ];

    protected $casts = [
        'features' => 'array',
        'status'   => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('facility_image')->singleFile();
    }

    public function getFacilityImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('facility_image') ?: null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('id');
    }
}