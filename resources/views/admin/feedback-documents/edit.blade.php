@extends('layouts.admin')

@section('page-title', 'Edit Feedback Document')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.feedback-documents.index') }}" class="admin-back-link">Back to List</a>
        <h2 class="admin-page-title">Edit Feedback Document</h2>
        <p class="admin-page-subtitle">Update title, description or replace file.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.feedback-documents.update', $feedbackDocument) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

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
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" {{ old('type', $feedbackDocument->type) === $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" value="{{ old('title', $feedbackDocument->title) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="4" class="field-textarea">{{ old('description', $feedbackDocument->description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">PDF / Image File</label>
                    <input type="file" name="file" accept=".pdf,image/*" class="field-input {{ $errors->has('file') ? 'error' : '' }}">
                    @if($feedbackDocument->file_url)
                        <p class="field-hint">Current file: <a href="{{ $feedbackDocument->file_url }}" target="_blank">Open</a></p>
                    @else
                        <p class="field-hint">No file uploaded yet.</p>
                    @endif
                </div>

                <label class="role-checkbox-item {{ old('status', $feedbackDocument->status) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $feedbackDocument->status) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show on website</span>
                </label>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i> Update</button>
        <a href="{{ route('admin.feedback-documents.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection
