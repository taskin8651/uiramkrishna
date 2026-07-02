@extends('layouts.admin')

@section('page-title', 'College About Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            ← Back to Dashboard
        </a>

        <h2 class="admin-page-title">
            College About Page
        </h2>

        <p class="admin-page-subtitle">
            Manage college profile, history, academic profile, vision and mission content
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.college-about-page.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- ABOUT CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-university"></i>
                </div>

                <div>
                    <p class="form-card-title">College Profile</p>
                    <p class="form-card-subtitle">Main about page content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="about_title">
                        About Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="about_title"
                               id="about_title"
                               value="{{ old('about_title', $about->about_title) }}"
                               placeholder="A respected academic institution"
                               class="field-input {{ $errors->has('about_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('about_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('about_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="about_highlight">
                        About Highlight
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <input type="text"
                               name="about_highlight"
                               id="about_highlight"
                               value="{{ old('about_highlight', $about->about_highlight) }}"
                               placeholder="serving Patna since 1975."
                               class="field-input {{ $errors->has('about_highlight') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('about_highlight'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('about_highlight') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="about_lead">
                        Lead Description
                    </label>

                    <textarea name="about_lead"
                              id="about_lead"
                              rows="5"
                              placeholder="Enter main college profile description"
                              class="field-textarea {{ $errors->has('about_lead') ? 'error' : '' }}">{{ old('about_lead', $about->about_lead) }}</textarea>

                    @if($errors->has('about_lead'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('about_lead') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="about_description">
                        Second Description
                    </label>

                    <textarea name="about_description"
                              id="about_description"
                              rows="5"
                              placeholder="Enter second paragraph"
                              class="field-textarea {{ $errors->has('about_description') ? 'error' : '' }}">{{ old('about_description', $about->about_description) }}</textarea>

                    @if($errors->has('about_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('about_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="info_title">
                        Info Box Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-graduation-cap icon"></i>

                        <input type="text"
                               name="info_title"
                               id="info_title"
                               value="{{ old('info_title', $about->info_title) }}"
                               placeholder="Constituent Unit of Patliputra University"
                               class="field-input {{ $errors->has('info_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('info_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('info_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="info_description">
                        Info Box Description
                    </label>

                    <textarea name="info_description"
                              id="info_description"
                              rows="4"
                              placeholder="Enter info box description"
                              class="field-textarea {{ $errors->has('info_description') ? 'error' : '' }}">{{ old('info_description', $about->info_description) }}</textarea>

                    @if($errors->has('info_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('info_description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- IMAGE AND STATS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Academic Identity</p>
                    <p class="form-card-subtitle">Upload about image and update statistics</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="about_image">
                        About Image
                    </label>

                    <input type="file"
                           name="about_image"
                           id="about_image"
                           class="field-input {{ $errors->has('about_image') ? 'error' : '' }}">

                    @if($errors->has('about_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('about_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Upload jpg, jpeg, png or webp image. Max size 4MB.
                        </p>
                    @endif

                    @if($about->about_image_url)
                        <div style="margin-top:14px;">
                            <img src="{{ $about->about_image_url }}"
                                 alt="About Image"
                                 style="width:180px;height:120px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="media_title">
                        Media Card Title
                    </label>

                    <textarea name="media_title"
                              id="media_title"
                              rows="4"
                              placeholder="Focused on student-centric learning and institutional growth."
                              class="field-textarea {{ $errors->has('media_title') ? 'error' : '' }}">{{ old('media_title', $about->media_title) }}</textarea>

                    @if($errors->has('media_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('media_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        About Points
                    </label>

                    @for($i = 0; $i < 4; $i++)
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-check-circle icon"></i>

                            <input type="text"
                                   name="points[]"
                                   value="{{ old('points.' . $i, data_get($about->points, $i)) }}"
                                   placeholder="Point {{ $i + 1 }}"
                                   class="field-input">
                        </div>
                    @endfor
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Statistics
                    </label>

                    @for($i = 0; $i < 4; $i++)
                        <div class="row g-2" style="margin-bottom:10px;">
                            <div class="col-md-5">
                                <div class="input-icon-wrap">
                                    <i class="fas fa-chart-line icon"></i>

                                    <input type="text"
                                           name="stats[{{ $i }}][value]"
                                           value="{{ old('stats.' . $i . '.value', data_get($about->stats, $i . '.value')) }}"
                                           placeholder="1975"
                                           class="field-input">
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="input-icon-wrap">
                                    <i class="fas fa-tag icon"></i>

                                    <input type="text"
                                           name="stats[{{ $i }}][label]"
                                           value="{{ old('stats.' . $i . '.label', data_get($about->stats, $i . '.label')) }}"
                                           placeholder="Established"
                                           class="field-input">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </div>

        {{-- HISTORY --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-history"></i>
                </div>

                <div>
                    <p class="form-card-title">Institutional Journey</p>
                    <p class="form-card-subtitle">Manage college history content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="history_title">
                        History Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>

                        <input type="text"
                               name="history_title"
                               id="history_title"
                               value="{{ old('history_title', $about->history_title) }}"
                               placeholder="College History"
                               class="field-input {{ $errors->has('history_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('history_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('history_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="history_description">
                        History Description
                    </label>

                    <textarea name="history_description"
                              id="history_description"
                              rows="5"
                              placeholder="Enter college history description"
                              class="field-textarea {{ $errors->has('history_description') ? 'error' : '' }}">{{ old('history_description', $about->history_description) }}</textarea>

                    @if($errors->has('history_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('history_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        History Timeline
                    </label>

                    @for($i = 0; $i < 3; $i++)
                        <div class="row g-2" style="margin-bottom:10px;">
                            <div class="col-md-4">
                                <div class="input-icon-wrap">
                                    <i class="fas fa-calendar icon"></i>

                                    <input type="text"
                                           name="history_items[{{ $i }}][year]"
                                           value="{{ old('history_items.' . $i . '.year', data_get($about->history_items, $i . '.year')) }}"
                                           placeholder="Year"
                                           class="field-input">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="input-icon-wrap">
                                    <i class="fas fa-align-left icon"></i>

                                    <input type="text"
                                           name="history_items[{{ $i }}][text]"
                                           value="{{ old('history_items.' . $i . '.text', data_get($about->history_items, $i . '.text')) }}"
                                           placeholder="Timeline description"
                                           class="field-input">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </div>

        {{-- PROFILE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-users"></i>
                </div>

                <div>
                    <p class="form-card-title">Academic Profile</p>
                    <p class="form-card-subtitle">Teaching, learning and development content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="profile_title">
                        Profile Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-chalkboard-teacher icon"></i>

                        <input type="text"
                               name="profile_title"
                               id="profile_title"
                               value="{{ old('profile_title', $about->profile_title) }}"
                               placeholder="Teaching, Learning & Development"
                               class="field-input {{ $errors->has('profile_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('profile_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('profile_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="profile_description">
                        Profile Description
                    </label>

                    <textarea name="profile_description"
                              id="profile_description"
                              rows="5"
                              placeholder="Enter academic profile description"
                              class="field-textarea {{ $errors->has('profile_description') ? 'error' : '' }}">{{ old('profile_description', $about->profile_description) }}</textarea>

                    @if($errors->has('profile_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('profile_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Profile Tags
                    </label>

                    @for($i = 0; $i < 6; $i++)
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-tag icon"></i>

                            <input type="text"
                                   name="profile_tags[]"
                                   value="{{ old('profile_tags.' . $i, data_get($about->profile_tags, $i)) }}"
                                   placeholder="Tag {{ $i + 1 }}"
                                   class="field-input">
                        </div>
                    @endfor
                </div>

            </div>
        </div>

        {{-- VISION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <p class="form-card-title">Vision Section</p>
                    <p class="form-card-subtitle">Manage vision and intro content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="vm_title">
                        Vision Mission Section Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="vm_title"
                               id="vm_title"
                               value="{{ old('vm_title', $about->vm_title) }}"
                               placeholder="Academic Vision and Institutional Mission"
                               class="field-input {{ $errors->has('vm_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('vm_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('vm_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="vm_description">
                        Vision Mission Description
                    </label>

                    <textarea name="vm_description"
                              id="vm_description"
                              rows="4"
                              placeholder="Enter vision mission intro description"
                              class="field-textarea {{ $errors->has('vm_description') ? 'error' : '' }}">{{ old('vm_description', $about->vm_description) }}</textarea>

                    @if($errors->has('vm_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('vm_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="vision_title">
                        Vision Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-eye icon"></i>

                        <input type="text"
                               name="vision_title"
                               id="vision_title"
                               value="{{ old('vision_title', $about->vision_title) }}"
                               placeholder="Aligned with NEP-2020"
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
                              class="field-textarea {{ $errors->has('vision_description') ? 'error' : '' }}">{{ old('vision_description', $about->vision_description) }}</textarea>

                    @if($errors->has('vision_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('vision_description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- MISSION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission Items</p>
                    <p class="form-card-subtitle">Manage mission cards content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">
                        Mission Cards
                    </label>

                    @for($i = 0; $i < 6; $i++)
                        <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:12px;">
                            <div class="field-group" style="margin-bottom:10px;">
                                <div class="input-icon-wrap">
                                    <i class="fas fa-heading icon"></i>

                                    <input type="text"
                                           name="missions[{{ $i }}][title]"
                                           value="{{ old('missions.' . $i . '.title', data_get($about->missions, $i . '.title')) }}"
                                           placeholder="Mission Title {{ $i + 1 }}"
                                           class="field-input">
                                </div>
                            </div>

                            <div class="field-group" style="margin-bottom:0;">
                                <div class="input-icon-wrap">
                                    <i class="fas fa-align-left icon"></i>

                                    <input type="text"
                                           name="missions[{{ $i }}][description]"
                                           value="{{ old('missions.' . $i . '.description', data_get($about->missions, $i . '.description')) }}"
                                           placeholder="Mission Description {{ $i + 1 }}"
                                           class="field-input">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <label class="role-checkbox-item {{ old('status', $about->status) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $about->status) ? 'checked' : '' }}>

                    <div class="check-icon"></div>

                    <span class="checkbox-text">Show this about page content on website</span>
                </label>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Badge, frontend icons and section design will remain static. Only content and image will update dynamically.
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