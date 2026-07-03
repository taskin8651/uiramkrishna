@extends('layouts.admin')

@section('page-title', 'Edit Academic Course')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.academic-courses.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Edit Academic Course</h2>
        <p class="admin-page-subtitle">Update course card and table row.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.academic-courses.update', $academicCourse) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>

                <div>
                    <p class="form-card-title">Course Details</p>
                    <p class="form-card-subtitle">Basic course information</p>
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
                                <option value="{{ $id }}" {{ old('academic_course_page_id', $academicCourse->academic_course_page_id) == $id ? 'selected' : '' }}>
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
                        <input type="number" name="sort_order" id="sort_order"
                               value="{{ old('sort_order', $academicCourse->sort_order) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon_class" id="icon_class"
                               value="{{ old('icon_class', $academicCourse->icon_class) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="stream_label">Stream Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="stream_label" id="stream_label"
                               value="{{ old('stream_label', $academicCourse->stream_label) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="course_name">Course Name <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-book icon"></i>
                        <input type="text" name="course_name" id="course_name"
                               value="{{ old('course_name', $academicCourse->course_name) }}"
                               required class="field-input {{ $errors->has('course_name') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('course_name'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('course_name') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="field-textarea">{{ old('description', $academicCourse->description) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-clock"></i>
                </div>

                <div>
                    <p class="form-card-title">Duration & Eligibility</p>
                    <p class="form-card-subtitle">Course meta details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="duration">Duration</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>
                        <input type="text" name="duration" id="duration"
                               value="{{ old('duration', $academicCourse->duration) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="eligibility">Eligibility</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-user-check icon"></i>
                        <input type="text" name="eligibility" id="eligibility"
                               value="{{ old('eligibility', $academicCourse->eligibility) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="type_label">Type Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>
                        <input type="text" name="type_label" id="type_label"
                               value="{{ old('type_label', $academicCourse->type_label) }}"
                               class="field-input">
                    </div>
                </div>

                <label class="role-checkbox-item {{ old('status', $academicCourse->status) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $academicCourse->status) ? 'checked' : '' }}>
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

        <a href="{{ route('admin.academic-courses.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection