<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CollegePrincipalMessage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'principal_name',
        'principal_label',
        'principal_designation',
        'profile_points',
        'desk_label',
        'greeting_title',
        'message_paragraphs',
        'highlight_title',
        'highlight_description',
        'signature_name',
        'signature_designation',
        'button_text',
        'button_url',
        'status',
    ];

    protected $casts = [
        'profile_points'     => 'array',
        'message_paragraphs' => 'array',
        'status'             => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('principal_image')->singleFile();
    }

    public function getPrincipalImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('principal_image') ?: null;
    }
}