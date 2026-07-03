@extends('layouts.admin')

@section('page-title', 'Add Campus Facility')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.campus-facilities.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Add Campus Facility</h2>
        <p class="admin-page-subtitle">Create dynamic content for infrastructure facility page.</p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.campus-facilities.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-building"></i>
                </div>

                <div>
                    <p class="form-card-title">Basic Facility</p>
                    <p class="form-card-subtitle">Image and left card content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="slug">Slug <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               required
                               placeholder="conference-room"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @else
                        <p class="field-hint">Example: conference-room, smart-room, seminar-hall, canteen</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="css_prefix">CSS Prefix</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-code icon"></i>
                        <input type="text"
                               name="css_prefix"
                               id="css_prefix"
                               value="{{ old('css_prefix') }}"
                               placeholder="conf"
                               class="field-input {{ $errors->has('css_prefix') ? 'error' : '' }}">
                    </div>

                    <p class="field-hint">Example: conf, smart, seminar, canteen</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="facility_image">Facility Image</label>

                    <input type="file"
                           name="facility_image"
                           id="facility_image"
                           class="field-input {{ $errors->has('facility_image') ? 'error' : '' }}">

                    @if($errors->has('facility_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('facility_image') }}
                        </p>
                    @else
                        <p class="field-hint">Upload jpg, jpeg, png or webp image. Max 4MB.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">Image Alt</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>
                        <input type="text"
                               name="image_alt"
                               id="image_alt"
                               value="{{ old('image_alt') }}"
                               placeholder="RKD College Conference Room"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_title">Image Card Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="image_title"
                               id="image_title"
                               value="{{ old('image_title') }}"
                               placeholder="Conference Hall"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_description">Image Card Description</label>

                    <textarea name="image_description"
                              id="image_description"
                              rows="4"
                              class="field-textarea">{{ old('image_description') }}</textarea>
                </div>

                <label class="role-checkbox-item {{ old('status', true) ? 'checked' : '' }}">
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

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <div>
                    <p class="form-card-title">Right Panel Content</p>
                    <p class="form-card-subtitle">Heading and main description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="panel_title">Panel Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="panel_title"
                               id="panel_title"
                               value="{{ old('panel_title') }}"
                               placeholder="Academic & Institutional Meeting Space"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="lead_description">Lead Description</label>

                    <textarea name="lead_description"
                              id="lead_description"
                              rows="7"
                              class="field-textarea">{{ old('lead_description') }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-th-large"></i>
                </div>

                <div>
                    <p class="form-card-title">Feature Cards</p>
                    <p class="form-card-subtitle">Icon, title and description for facility highlights</p>
                </div>
            </div>

            <div class="form-card-body">

                @for($i = 0; $i < 4; $i++)
                    <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:14px;">
                        <p class="field-label" style="margin-bottom:10px;">Feature {{ $i + 1 }}</p>

                        <div class="field-group">
                            <label class="field-label">Icon Class</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-icons icon"></i>
                                <input type="text"
                                       name="features[{{ $i }}][icon]"
                                       value="{{ old('features.' . $i . '.icon') }}"
                                       placeholder="bi bi-people-fill"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Title</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-heading icon"></i>
                                <input type="text"
                                       name="features[{{ $i }}][title]"
                                       value="{{ old('features.' . $i . '.title') }}"
                                       placeholder="Meetings"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Description</label>
                            <textarea name="features[{{ $i }}][description]"
                                      rows="3"
                                      class="field-textarea">{{ old('features.' . $i . '.description') }}</textarea>
                        </div>
                    </div>
                @endfor

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save
        </button>

        <a href="{{ route('admin.campus-facilities.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection