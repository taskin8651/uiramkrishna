@extends('layouts.admin')

@section('page-title', 'Add Academic Help Card')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.academic-help-cards.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Add Academic Help Card</h2>
        <p class="admin-page-subtitle">Create a support/help card for course pages.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.academic-help-cards.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">Help Card Details</p>
                    <p class="form-card-subtitle">Card title, page and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="academic_course_page_id">Course Page <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-file-alt icon"></i>
                        <select name="academic_course_page_id" id="academic_course_page_id" required class="field-input">
                            <option value="">Select Page</option>
                            @foreach($pages as $id => $page)
                                <option value="{{ $id }}" {{ old('academic_course_page_id') == $id ? 'selected' : '' }}>
                                    {{ $page }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon_class" id="icon_class" value="{{ old('icon_class') }}"
                               placeholder="bi bi-file-earmark-text-fill"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                               required placeholder="Required Documents"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="5" class="field-textarea">{{ old('description') }}</textarea>
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
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save
        </button>

        <a href="{{ route('admin.academic-help-cards.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection