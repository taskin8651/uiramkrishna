<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CollegeAboutPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'about_title',
        'about_highlight',
        'about_lead',
        'about_description',
        'info_title',
        'info_description',
        'points',
        'media_title',
        'stats',
        'history_title',
        'history_description',
        'history_items',
        'profile_title',
        'profile_description',
        'profile_tags',
        'vm_title',
        'vm_description',
        'vision_title',
        'vision_description',
        'missions',
        'status',
    ];

    protected $casts = [
        'points'        => 'array',
        'stats'         => 'array',
        'history_items' => 'array',
        'profile_tags'  => 'array',
        'missions'      => 'array',
        'status'        => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about_image')->singleFile();
    }

    public function getAboutImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('about_image') ?: null;
    }
}