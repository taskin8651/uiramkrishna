@extends('layouts.admin')

@section('page-title', 'Add Feedback Document')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.feedback-documents.index') }}" class="admin-back-link">Back to List</a>
        <h2 class="admin-page-title">Add Feedback Document</h2>
        <p class="admin-page-subtitle">Only title, description and file are needed.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.feedback-documents.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-comments"></i></div>
                <div>
                    <p class="form-card-title">Feedback Details</p>
                    <p class="form-card-subtitle">Select feedback type and add content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Feedback Type <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>
                        <select name="type" required class="field-input {{ $errors->has('type') ? 'error' : '' }}">
                            <option value="">Select Type</option>
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" {{ old('type') === $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Student Feedback Form" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="4" class="field-textarea" placeholder="Official feedback form description">{{ old('description') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">PDF / Image File</label>
                    <input type="file" name="file" accept=".pdf,image/*" class="field-input {{ $errors->has('file') ? 'error' : '' }}">
                    <p class="field-hint">Allowed: PDF, JPG, PNG, WEBP. Max 10MB. File will be stored in media library.</p>
                </div>

                <label class="role-checkbox-item {{ old('status', true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show on website</span>
                </label>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i> Save</button>
        <a href="{{ route('admin.feedback-documents.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection
