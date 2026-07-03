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