<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class QualityDocumentPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'slug',
        'card_title',
        'pdf_items',
        'status',
    ];

    protected $casts = [
        'pdf_items' => 'array',
        'status'    => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('quality_documents');
    }
}