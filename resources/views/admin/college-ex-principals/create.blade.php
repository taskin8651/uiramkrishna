@extends('layouts.admin')

@section('page-title', 'Add Ex Principal')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.college-ex-principals.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Add Ex Principal</h2>
        <p class="admin-page-subtitle">Create a principal or incharge principal record.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.college-ex-principals.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <p class="form-card-title">Principal Record</p>
                    <p class="form-card-subtitle">Basic details for table listing</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sl. No. <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order') }}"
                               required
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}"
                               placeholder="1">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="name">Name <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}"
                               placeholder="Prof. (Dr.) Name">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="post_type">Post <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>

                        <select name="post_type"
                                id="post_type"
                                required
                                class="field-input {{ $errors->has('post_type') ? 'error' : '' }}">
                            <option value="principal" {{ old('post_type') === 'principal' ? 'selected' : '' }}>Principal</option>
                            <option value="incharge" {{ old('post_type') === 'incharge' ? 'selected' : '' }}>Incharge</option>
                        </select>
                    </div>

                    @if($errors->has('post_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('post_type') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="period">Period <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>
                        <input type="text"
                               name="period"
                               id="period"
                               value="{{ old('period') }}"
                               required
                               class="field-input {{ $errors->has('period') ? 'error' : '' }}"
                               placeholder="15.05.2025 - Present">
                    </div>

                    @if($errors->has('period'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('period') }}
                        </p>
                    @endif
                </div>

                <label class="role-checkbox-item {{ old('is_current') ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="is_current"
                           value="1"
                           class="role-checkbox"
                           {{ old('is_current') ? 'checked' : '' }}>

                    <div class="check-icon"></div>
                    <span class="checkbox-text">Mark as current principal</span>
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

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save
        </button>

        <a href="{{ route('admin.college-ex-principals.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection