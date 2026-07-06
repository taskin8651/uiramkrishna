<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityDocumentPage extends Model
{
    protected $fillable = [
        'slug',
        'css_prefix',
        'template_type',

        'subtitle_icon',
        'subtitle_text',
        'card_title',

        'official_button_text',
        'official_button_url',

        'pdf_items',
        'meta_items',

        'preview_enabled',
        'preview_subtitle_icon',
        'preview_subtitle_text',
        'preview_title',
        'preview_button_text',
        'preview_pdf_url',
        'preview_iframe_title',

        'download_button_text',

        'status',
    ];

    protected $casts = [
        'pdf_items'       => 'array',
        'meta_items'      => 'array',
        'preview_enabled' => 'boolean',
        'status'          => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('id');
    }
}