@extends('layouts.admin')

@section('page-title', 'Edit Department Stream')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.department-streams.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Edit Department Stream</h2>
        <p class="admin-page-subtitle">Update academic faculty or department stream.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.department-streams.update', $departmentStream) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <p class="form-card-title">Stream Details</p>
                    <p class="form-card-subtitle">Faculty label, stream name and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order"
                               value="{{ old('sort_order', $departmentStream->sort_order) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="faculty_label">Faculty Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="faculty_label" id="faculty_label"
                               value="{{ old('faculty_label', $departmentStream->faculty_label) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="name">Stream Name <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-columns icon"></i>
                        <input type="text" name="name" id="name"
                               value="{{ old('name', $departmentStream->name) }}"
                               required class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('name'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon_class" id="icon_class"
                               value="{{ old('icon_class', $departmentStream->icon_class) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="type_label">Type Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>
                        <input type="text" name="type_label" id="type_label"
                               value="{{ old('type_label', $departmentStream->type_label) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="5"
                              class="field-textarea">{{ old('description', $departmentStream->description) }}</textarea>
                </div>

                <label class="role-checkbox-item {{ old('status', $departmentStream->status) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $departmentStream->status) ? 'checked' : '' }}>
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

        <a href="{{ route('admin.department-streams.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection