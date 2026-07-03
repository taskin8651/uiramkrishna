@extends('layouts.admin')

@section('page-title', 'Edit Download Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.download-categories.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Edit Download Category</h2>
        <p class="admin-page-subtitle">Update category for downloadable files.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.download-categories.update', $downloadCategory) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-folder"></i>
                </div>

                <div>
                    <p class="form-card-title">Category Details</p>
                    <p class="form-card-subtitle">Category name, slug and status</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $downloadCategory->sort_order) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="name">Category Name <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-folder-open icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $downloadCategory->name) }}"
                               required
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="slug">Slug</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug', $downloadCategory->slug) }}"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>

                <label class="role-checkbox-item {{ old('status', $downloadCategory->status) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $downloadCategory->status) ? 'checked' : '' }}>

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

        <a href="{{ route('admin.download-categories.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection