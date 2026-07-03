@extends('layouts.admin')

@section('page-title', 'Add Download')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.download-items.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Add Download</h2>
        <p class="admin-page-subtitle">Upload downloadable document or file.</p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.download-items.store') }}"
      enctype="multipart/form-data">
    @csrf

    @php
        $summaryItems = old('summary_items', array_fill(0, 3, ['label' => '', 'value' => '']));
        $infoCards = old('info_cards', array_fill(0, 4, ['icon' => '', 'title' => '', 'description' => '']));
        $tableRows = old('table_rows', array_fill(0, 3, ['title' => '', 'details' => '', 'button' => '']));
    @endphp

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-download"></i>
                </div>

                <div>
                    <p class="form-card-title">Download Details</p>
                    <p class="form-card-subtitle">Title, category and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="download_category_id">Category</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-folder icon"></i>

                        <select name="download_category_id"
                                id="download_category_id"
                                class="field-input {{ $errors->has('download_category_id') ? 'error' : '' }}">
                            <option value="">Select Category</option>

                            @foreach($categories as $id => $category)
                                <option value="{{ $id }}" {{ old('download_category_id') == $id ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('download_category_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('download_category_id') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Title <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Admission Form"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Short download description"
                              class="field-textarea">{{ old('description') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="year">Year</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar icon"></i>

                        <input type="text"
                               name="year"
                               id="year"
                               value="{{ old('year', date('Y')) }}"
                               placeholder="2026"
                               class="field-input">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-upload"></i>
                </div>

                <div>
                    <p class="form-card-title">File Upload</p>
                    <p class="form-card-subtitle">Upload PDF, document, image or zip file</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="download_file">Download File</label>

                    <input type="file"
                           name="download_file"
                           id="download_file"
                           class="field-input {{ $errors->has('download_file') ? 'error' : '' }}">

                    @if($errors->has('download_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('download_file') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Allowed: pdf, doc, docx, xls, xlsx, ppt, pptx, jpg, png, webp, zip. Max 10MB.
                        </p>
                    @endif
                </div>

                <label class="role-checkbox-item {{ old('is_featured') ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           class="role-checkbox"
                           {{ old('is_featured') ? 'checked' : '' }}>

                    <div class="check-icon"></div>
                    <span class="checkbox-text">Mark as featured</span>
                </label>

                <label class="role-checkbox-item {{ old('status', true) ? 'checked' : '' }}" style="margin-top:10px;">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', true) ? 'checked' : '' }}>

                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show on website</span>
                </label>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        File will be stored using Spatie Media Library.
                    </p>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Detail Page Content</p>
                    <p class="form-card-subtitle">Frontend detail page hero and external URL</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="slug">Slug</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('slug'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('slug') }}</p>
                    @else
                        <p class="field-hint">Leave blank to generate from title.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="kicker_text">Kicker Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="kicker_text" id="kicker_text" value="{{ old('kicker_text') }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_title">Hero Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="hero_title" id="hero_title" value="{{ old('hero_title') }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_description">Hero Description</label>
                    <textarea name="hero_description" id="hero_description" rows="4" class="field-textarea">{{ old('hero_description') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="external_url">External URL</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-external-link-alt icon"></i>
                        <input type="url" name="external_url" id="external_url" value="{{ old('external_url') }}" class="field-input {{ $errors->has('external_url') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('external_url'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('external_url') }}</p>
                    @else
                        <p class="field-hint">Used when no uploaded file exists.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>

                <div>
                    <p class="form-card-title">Document Details</p>
                    <p class="form-card-subtitle">Official document metadata</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach(['document_code' => 'Document Code', 'authority' => 'Authority', 'document_date' => 'Document Date', 'session_reference' => 'Session Reference', 'class_start' => 'Class Start'] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-info-circle icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field) }}" class="field-input">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list"></i>
                </div>

                <div>
                    <p class="form-card-title">Summary Items</p>
                    <p class="form-card-subtitle">Minimum three label and value rows</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($summaryItems as $index => $item)
                    <div class="field-group">
                        <label class="field-label">Summary Row {{ $index + 1 }}</label>
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-tag icon"></i>
                            <input type="text" name="summary_items[{{ $index }}][label]" value="{{ data_get($item, 'label') }}" placeholder="Label" class="field-input">
                        </div>
                        <div class="input-icon-wrap">
                            <i class="fas fa-align-left icon"></i>
                            <input type="text" name="summary_items[{{ $index }}][value]" value="{{ data_get($item, 'value') }}" placeholder="Value" class="field-input">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-th-large"></i>
                </div>

                <div>
                    <p class="form-card-title">Info Cards</p>
                    <p class="form-card-subtitle">Minimum four icon, title and description rows</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($infoCards as $index => $card)
                    <div class="field-group">
                        <label class="field-label">Info Card {{ $index + 1 }}</label>
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-icons icon"></i>
                            <input type="text" name="info_cards[{{ $index }}][icon]" value="{{ data_get($card, 'icon') }}" placeholder="bi bi-info-circle-fill" class="field-input">
                        </div>
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-heading icon"></i>
                            <input type="text" name="info_cards[{{ $index }}][title]" value="{{ data_get($card, 'title') }}" placeholder="Title" class="field-input">
                        </div>
                        <textarea name="info_cards[{{ $index }}][description]" rows="3" placeholder="Description" class="field-textarea">{{ data_get($card, 'description') }}</textarea>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-table"></i>
                </div>

                <div>
                    <p class="form-card-title">Table Rows</p>
                    <p class="form-card-subtitle">Minimum three table rows for frontend details</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($tableRows as $index => $row)
                    <div class="field-group">
                        <label class="field-label">Table Row {{ $index + 1 }}</label>
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-heading icon"></i>
                            <input type="text" name="table_rows[{{ $index }}][title]" value="{{ data_get($row, 'title') }}" placeholder="Title" class="field-input">
                        </div>
                        <textarea name="table_rows[{{ $index }}][details]" rows="3" placeholder="Details" class="field-textarea" style="margin-bottom:10px;">{{ data_get($row, 'details') }}</textarea>
                        <div class="input-icon-wrap">
                            <i class="fas fa-mouse-pointer icon"></i>
                            <input type="text" name="table_rows[{{ $index }}][button]" value="{{ data_get($row, 'button') }}" placeholder="Button Text" class="field-input">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save
        </button>

        <a href="{{ route('admin.download-items.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection
