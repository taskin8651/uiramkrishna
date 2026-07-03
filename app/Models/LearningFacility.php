<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LearningFacility extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'slug',
        'css_prefix',

        'hero_icon',
        'hero_kicker',
        'hero_title',
        'hero_description',

        'image_badge',
        'image_alt',
        'image_title',
        'image_description',

        'panel_subtitle',
        'panel_title',
        'lead_description',

        'button_text',
        'button_url',
        'button_external',

        'features',

        'gallery_label',
        'gallery_title',
        'gallery_description',
        'gallery_items',

        'detail_label',
        'detail_title',
        'detail_button_text',
        'detail_button_url',
        'detail_items',

        'status',
    ];

    protected $casts = [
        'features'        => 'array',
        'gallery_items'   => 'array',
        'detail_items'    => 'array',
        'button_external' => 'boolean',
        'status'          => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main_image')->singleFile();
    }

    public function getMainImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('main_image') ?: null;
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