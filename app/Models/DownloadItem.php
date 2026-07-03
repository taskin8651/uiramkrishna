<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DownloadItem extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'download_category_id',
        'sort_order',
        'title',
        'slug',
        'description',
        'kicker_text',
        'hero_title',
        'hero_description',
        'year',
        'document_code',
        'authority',
        'document_date',
        'session_reference',
        'class_start',
        'summary_items',
        'info_cards',
        'table_rows',
        'external_url',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'summary_items' => 'array',
        'info_cards'    => 'array',
        'table_rows'    => 'array',
        'is_featured'   => 'boolean',
        'status'        => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($item) {
            if (blank($item->slug) && filled($item->title)) {
                $item->slug = Str::slug($item->title);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(DownloadCategory::class, 'download_category_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('download_file')->singleFile();
    }

    public function getDownloadFileUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('download_file') ?: null;
    }

    public function getFinalDownloadUrlAttribute(): ?string
    {
        return $this->download_file_url ?: $this->external_url;
    }

    public function getDownloadFileNameAttribute(): ?string
    {
        $file = $this->getFirstMedia('download_file');

        return $file ? $file->file_name : null;
    }

    public function getDownloadFileSizeAttribute(): ?string
    {
        $file = $this->getFirstMedia('download_file');

        if (!$file) {
            return null;
        }

        $bytes = $file->size;

        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 2) . ' MB';
        }

        return round($bytes / 1024, 2) . ' KB';
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