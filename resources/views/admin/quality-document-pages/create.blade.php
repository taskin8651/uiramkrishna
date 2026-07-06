@extends('layouts.admin')

@section('page-title', 'Add Quality Document Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.quality-document-pages.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Add Quality Document Page</h2>
        <p class="admin-page-subtitle">Create NAAC, AQAR, IQAC, ICT or SSR document page.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.quality-document-pages.store') }}">
    @csrf

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

                        <input type="text"
                               name="slug"
                               value="{{ old('slug') }}"
                               required
                               placeholder="aqar"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    <p class="field-hint">Example: naac, aqar, iqac, ict, ssr</p>
                </div>

                <div class="field-group">
                    <label class="field-label">CSS Prefix</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-code icon"></i>

                        <input type="text"
                               name="css_prefix"
                               value="{{ old('css_prefix') }}"
                               placeholder="aqar"
                               class="field-input">
                    </div>

                    <p class="field-hint">Example: aqar, naacn, iqac, ictdoc, ssr</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Template Type</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="template_type" class="field-input">
                            <option value="grid" {{ old('template_type', 'grid') == 'grid' ? 'selected' : '' }}>
                                Grid PDF List
                            </option>

                            <option value="single_pdf" {{ old('template_type') == 'single_pdf' ? 'selected' : '' }}>
                                Single PDF Preview
                            </option>
                        </select>
                    </div>

                    <p class="field-hint">AQAR ke liye Grid, NAAC/SSR ke liye Single PDF use karo.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Subtitle Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="subtitle_icon"
                               value="{{ old('subtitle_icon', 'bi bi-file-earmark-pdf-fill') }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Subtitle Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="subtitle_text"
                               value="{{ old('subtitle_text') }}"
                               placeholder="Official PDFs"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Card Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="card_title"
                               value="{{ old('card_title') }}"
                               placeholder="AQAR Reports"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Official Button Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>

                        <input type="text"
                               name="official_button_text"
                               value="{{ old('official_button_text') }}"
                               placeholder="Official Page"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Official Button URL</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="official_button_url"
                               value="{{ old('official_button_url') }}"
                               placeholder="https://example.com"
                               class="field-input">
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
                    <p class="form-card-subtitle">Add PDF list items</p>
                </div>
            </div>

            <div class="form-card-body">

                @for($i = 0; $i < 10; $i++)
                    <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:14px;">
                        <p class="field-label" style="margin-bottom:10px;">PDF Item {{ $i + 1 }}</p>

                        <div class="field-group">
                            <label class="field-label">Title</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-heading icon"></i>

                                <input type="text"
                                       name="pdf_items[{{ $i }}][title]"
                                       value="{{ old('pdf_items.' . $i . '.title') }}"
                                       placeholder="AQAR 2021-22"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Description</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-align-left icon"></i>

                                <input type="text"
                                       name="pdf_items[{{ $i }}][description]"
                                       value="{{ old('pdf_items.' . $i . '.description') }}"
                                       placeholder="YEARLY STATUS REPORT - 2021-2022"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">PDF URL</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-link icon"></i>

                                <input type="text"
                                       name="pdf_items[{{ $i }}][url]"
                                       value="{{ old('pdf_items.' . $i . '.url') }}"
                                       placeholder="https://example.com/file.pdf"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Button Text</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-mouse-pointer icon"></i>

                                <input type="text"
                                       name="pdf_items[{{ $i }}][button_text]"
                                       value="{{ old('pdf_items.' . $i . '.button_text', 'View PDF') }}"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Icon Class</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-icons icon"></i>

                                <input type="text"
                                       name="pdf_items[{{ $i }}][icon]"
                                       value="{{ old('pdf_items.' . $i . '.icon', 'bi bi-file-earmark-pdf-fill') }}"
                                       class="field-input">
                            </div>
                        </div>
                    </div>
                @endfor

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
                @for($i = 0; $i < 4; $i++)
                    <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:14px;">
                        <p class="field-label" style="margin-bottom:10px;">Meta {{ $i + 1 }}</p>

                        <div class="field-group">
                            <label class="field-label">Icon</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-icons icon"></i>
                                <input type="text" name="meta_items[{{ $i }}][icon]" value="{{ old('meta_items.' . $i . '.icon') }}" placeholder="bi bi-files" class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Label</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-tag icon"></i>
                                <input type="text" name="meta_items[{{ $i }}][label]" value="{{ old('meta_items.' . $i . '.label') }}" placeholder="Pages" class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Value</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-align-left icon"></i>
                                <input type="text" name="meta_items[{{ $i }}][value]" value="{{ old('meta_items.' . $i . '.value') }}" placeholder="34 Pages" class="field-input">
                            </div>
                        </div>
                    </div>
                @endfor
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

                <label class="role-checkbox-item {{ old('preview_enabled') ? 'checked' : '' }}">
                    <input type="checkbox" name="preview_enabled" value="1" class="role-checkbox" {{ old('preview_enabled') ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show PDF preview</span>
                </label>

                <div class="field-group">
                    <label class="field-label">Preview Subtitle Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="preview_subtitle_icon" value="{{ old('preview_subtitle_icon', 'bi bi-eye-fill') }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Preview Subtitle Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="preview_subtitle_text" value="{{ old('preview_subtitle_text', 'PDF Preview') }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Preview Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="preview_title" value="{{ old('preview_title') }}" placeholder="AQAR 2021-22 Preview" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Preview PDF URL</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="preview_pdf_url" value="{{ old('preview_pdf_url') }}" placeholder="https://example.com/file.pdf" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Preview Button Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text" name="preview_button_text" value="{{ old('preview_button_text', 'Open PDF') }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Iframe Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="preview_iframe_title" value="{{ old('preview_iframe_title') }}" placeholder="RKD College AQAR PDF" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Download Button Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-download icon"></i>
                        <input type="text" name="download_button_text" value="{{ old('download_button_text', 'View / Download PDF') }}" class="field-input">
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
                <label class="role-checkbox-item {{ old('status', true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show on website</span>
                </label>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save
        </button>

        <a href="{{ route('admin.quality-document-pages.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection