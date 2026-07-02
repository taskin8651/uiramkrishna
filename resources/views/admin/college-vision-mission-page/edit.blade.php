@extends('layouts.admin')

@section('page-title', 'Vision & Mission')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            ← Back to Dashboard
        </a>

        <h2 class="admin-page-title">Vision & Mission</h2>

        <p class="admin-page-subtitle">
            Manage vision and mission page content shown on the website
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.college-vision-mission-page.update') }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- VISION CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-eye"></i>
                </div>

                <div>
                    <p class="form-card-title">Vision Content</p>
                    <p class="form-card-subtitle">Manage vision title, description, highlight and points</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="vision_title">
                        Vision Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="vision_title"
                               id="vision_title"
                               value="{{ old('vision_title', $visionMission->vision_title) }}"
                               placeholder="NEP-2020 aligned academic development."
                               class="field-input {{ $errors->has('vision_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('vision_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('vision_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="vision_description">
                        Vision Description
                    </label>

                    <textarea name="vision_description"
                              id="vision_description"
                              rows="5"
                              placeholder="Enter vision description"
                              class="field-textarea {{ $errors->has('vision_description') ? 'error' : '' }}">{{ old('vision_description', $visionMission->vision_description) }}</textarea>

                    @if($errors->has('vision_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('vision_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="vision_highlight">
                        Vision Highlight
                    </label>

                    <textarea name="vision_highlight"
                              id="vision_highlight"
                              rows="4"
                              placeholder="Enter vision highlight"
                              class="field-textarea {{ $errors->has('vision_highlight') ? 'error' : '' }}">{{ old('vision_highlight', $visionMission->vision_highlight) }}</textarea>

                    @if($errors->has('vision_highlight'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('vision_highlight') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Vision Points
                    </label>

                    @for($i = 0; $i < 4; $i++)
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-check-circle icon"></i>

                            <input type="text"
                                   name="vision_points[]"
                                   value="{{ old('vision_points.' . $i, data_get($visionMission->vision_points, $i)) }}"
                                   placeholder="Vision Point {{ $i + 1 }}"
                                   class="field-input">
                        </div>
                    @endfor
                </div>

            </div>
        </div>

        {{-- MISSION CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-flag"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission Content</p>
                    <p class="form-card-subtitle">Manage mission title, description, highlight and points</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="mission_title">
                        Mission Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="mission_title"
                               id="mission_title"
                               value="{{ old('mission_title', $visionMission->mission_title) }}"
                               placeholder="Quality education with meaningful exposure."
                               class="field-input {{ $errors->has('mission_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('mission_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('mission_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="mission_description">
                        Mission Description
                    </label>

                    <textarea name="mission_description"
                              id="mission_description"
                              rows="5"
                              placeholder="Enter mission description"
                              class="field-textarea {{ $errors->has('mission_description') ? 'error' : '' }}">{{ old('mission_description', $visionMission->mission_description) }}</textarea>

                    @if($errors->has('mission_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('mission_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="mission_highlight">
                        Mission Highlight
                    </label>

                    <textarea name="mission_highlight"
                              id="mission_highlight"
                              rows="4"
                              placeholder="Enter mission highlight"
                              class="field-textarea {{ $errors->has('mission_highlight') ? 'error' : '' }}">{{ old('mission_highlight', $visionMission->mission_highlight) }}</textarea>

                    @if($errors->has('mission_highlight'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('mission_highlight') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Mission Points
                    </label>

                    @for($i = 0; $i < 4; $i++)
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-check-circle icon"></i>

                            <input type="text"
                                   name="mission_points[]"
                                   value="{{ old('mission_points.' . $i, data_get($visionMission->mission_points, $i)) }}"
                                   placeholder="Mission Point {{ $i + 1 }}"
                                   class="field-input">
                        </div>
                    @endfor
                </div>

                <label class="role-checkbox-item {{ old('status', $visionMission->status) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $visionMission->status) ? 'checked' : '' }}>

                    <div class="check-icon"></div>

                    <span class="checkbox-text">Show Vision & Mission on website</span>
                </label>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Frontend labels, icons and card design will remain static. Only content will update dynamically.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Content
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection