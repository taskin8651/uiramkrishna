@extends('layouts.admin')

@section('page-title', 'Edit Quality Document Page')

@section('content')

@php
    $pdfRows = old('pdf_items', $qualityDocumentPage->pdf_items ?? []);
    for ($i = count($pdfRows); $i < 10; $i++) {
        $pdfRows[] = ['title' => '', 'description' => '', 'url' => '', 'button_text' => 'View PDF', 'icon' => 'bi bi-file-earmark-pdf-fill'];
    }

    $metaRows = old('meta_items', $qualityDocumentPage->meta_items ?? []);
    for ($i = count($metaRows); $i < 4; $i++) {
        $metaRows[] = ['icon' => '', 'label' => '', 'value' => ''];
    }
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.quality-document-pages.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Edit Quality Document Page</h2>
        <p class="admin-page-subtitle">Update NAAC, AQAR, IQAC, ICT or SSR document page.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.quality-document-pages.update', $qualityDocumentPage) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <div>
                    <p class="form-card-title">Page Settings</p>
                    <p class="form-card-subtitle">Basic page and card heading details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Slug <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="slug" value="{{ old('slug', $qualityDocumentPage->slug) }}" required class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">CSS Prefix</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-code icon"></i>
                        <input type="text" name="css_prefix" value="{{ old('css_prefix', $qualityDocumentPage->css_prefix) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Template Type</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>
                        <select name="template_type" class="field-input">
                            <option value="grid" {{ old('template_type', $qualityDocumentPage->template_type) == 'grid' ? 'selected' : '' }}>Grid PDF List</option>
                            <option value="single_pdf" {{ old('template_type', $qualityDocumentPage->template_type) == 'single_pdf' ? 'selected' : '' }}>Single PDF Preview</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Subtitle Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="subtitle_icon" value="{{ old('subtitle_icon', $qualityDocumentPage->subtitle_icon) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Subtitle Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="subtitle_text" value="{{ old('subtitle_text', $qualityDocumentPage->subtitle_text) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Card Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="card_title" value="{{ old('card_title', $qualityDocumentPage->card_title) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Official Button Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text" name="official_button_text" value="{{ old('official_button_text', $qualityDocumentPage->official_button_text) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Official Button URL</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="official_button_url" value="{{ old('official_button_url', $qualityDocumentPage->official_button_url) }}" class="field-input">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <div>
                    <p class="form-card-title">PDF Documents</p>
                    <p class="form-card-subtitle">PDF list items</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($pdfRows as $i => $item)
                    <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:14px;">
                        <p class="field-label" style="margin-bottom:10px;">PDF Item {{ $i + 1 }}</p>

                        <div class="field-group">
                            <label class="field-label">Title</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-heading icon"></i>
                                <input type="text" name="pdf_items[{{ $i }}][title]" value="{{ data_get($item, 'title') }}" class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Description</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-align-left icon"></i>
                                <input type="text" name="pdf_items[{{ $i }}][description]" value="{{ data_get($item, 'description') }}" class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">PDF URL</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-link icon"></i>
                                <input type="text" name="pdf_items[{{ $i }}][url]" value="{{ data_get($item, 'url') }}" class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Button Text</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-mouse-pointer icon"></i>
                                <input type="text" name="pdf_items[{{ $i }}][button_text]" value="{{ data_get($item, 'button_text', 'View PDF') }}" class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Icon Class</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-icons icon"></i>
                                <input type="text" name="pdf_items[{{ $i }}][icon]" value="{{ data_get($item, 'icon', 'bi bi-file-earmark-pdf-fill') }}" class="field-input">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">Meta Items</p>
                    <p class="form-card-subtitle">Used for single PDF page like NAAC</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($metaRows as $i => $meta)
                    <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:14px;">
                        <p class="field-label" style="margin-bottom:10px;">Meta {{ $i + 1 }}</p>

                        <div class="field-group">
                            <label class="field-label">Icon</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-icons icon"></i>
                                <input type="text" name="meta_items[{{ $i }}][icon]" value="{{ data_get($meta, 'icon') }}" class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Label</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-tag icon"></i>
                                <input type="text" name="meta_items[{{ $i }}][label]" value="{{ data_get($meta, 'label') }}" class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Value</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-align-left icon"></i>
                                <input type="text" name="meta_items[{{ $i }}][value]" value="{{ data_get($meta, 'value') }}" class="field-input">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-eye"></i>
                </div>

                <div>
                    <p class="form-card-title">PDF Preview</p>
                    <p class="form-card-subtitle">Iframe preview settings</p>
                </div>
            </div>

            <div class="form-card-body">

                <label class="role-checkbox-item {{ old('preview_enabled', $qualityDocumentPage->preview_enabled) ? 'checked' : '' }}">
                    <input type="checkbox" name="preview_enabled" value="1" class="role-checkbox" {{ old('preview_enabled', $qualityDocumentPage->preview_enabled) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show PDF preview</span>
                </label>

                <div class="field-group">
                    <label class="field-label">Preview Subtitle Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="preview_subtitle_icon" value="{{ old('preview_subtitle_icon', $qualityDocumentPage->preview_subtitle_icon) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Preview Subtitle Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="preview_subtitle_text" value="{{ old('preview_subtitle_text', $qualityDocumentPage->preview_subtitle_text) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Preview Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="preview_title" value="{{ old('preview_title', $qualityDocumentPage->preview_title) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Preview PDF URL</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="preview_pdf_url" value="{{ old('preview_pdf_url', $qualityDocumentPage->preview_pdf_url) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Preview Button Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text" name="preview_button_text" value="{{ old('preview_button_text', $qualityDocumentPage->preview_button_text) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Iframe Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="preview_iframe_title" value="{{ old('preview_iframe_title', $qualityDocumentPage->preview_iframe_title) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Download Button Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-download icon"></i>
                        <input type="text" name="download_button_text" value="{{ old('download_button_text', $qualityDocumentPage->download_button_text) }}" class="field-input">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-toggle-on"></i>
                </div>

                <div>
                    <p class="form-card-title">Publish Settings</p>
                    <p class="form-card-subtitle">Control frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <label class="role-checkbox-item {{ old('status', $qualityDocumentPage->status) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $qualityDocumentPage->status) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show on website</span>
                </label>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update
        </button>

        <a href="{{ route('admin.quality-document-pages.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection