<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FeedbackDocument extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'type',
        'title',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('feedback_file')->singleFile();
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('feedback_file') ?: null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('type')->orderBy('id');
    }
}
