<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DownloadCategory extends Model
{
    protected $fillable = [
        'sort_order',
        'name',
        'slug',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            if (blank($category->slug) && filled($category->name)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function downloads()
    {
        return $this->hasMany(DownloadItem::class, 'download_category_id')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function activeDownloads()
    {
        return $this->hasMany(DownloadItem::class, 'download_category_id')
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id');
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