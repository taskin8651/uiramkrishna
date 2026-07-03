@extends('layouts.admin')

@section('page-title', 'Edit Department')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.departments.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Edit Department</h2>
        <p class="admin-page-subtitle">Update stream-wise department or subject.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.departments.update', $department) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-columns"></i>
                </div>

                <div>
                    <p class="form-card-title">Department Details</p>
                    <p class="form-card-subtitle">Department name, stream and frontend link</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="department_stream_id">Department Stream <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="department_stream_id"
                                id="department_stream_id"
                                required
                                class="field-input {{ $errors->has('department_stream_id') ? 'error' : '' }}">
                            <option value="">Select Stream</option>

                            @foreach($streams as $id => $stream)
                                <option value="{{ $id }}" {{ old('department_stream_id', $department->department_stream_id) == $id ? 'selected' : '' }}>
                                    {{ $stream }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('department_stream_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('department_stream_id') }}
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
                               value="{{ old('sort_order', $department->sort_order) }}"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="name">Department Name <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-book icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $department->name) }}"
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
                               value="{{ old('slug', $department->slug) }}"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="link_url">Frontend Link URL</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-external-link-alt icon"></i>

                        <input type="text"
                               name="link_url"
                               id="link_url"
                               value="{{ old('link_url', $department->link_url) }}"
                               class="field-input {{ $errors->has('link_url') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('link_url'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('link_url') }}
                        </p>
                    @endif
                </div>

                <label class="role-checkbox-item {{ old('status', $department->status) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $department->status) ? 'checked' : '' }}>

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

        <a href="{{ route('admin.departments.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection