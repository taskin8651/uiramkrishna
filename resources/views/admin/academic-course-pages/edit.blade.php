@extends('layouts.admin')

@section('page-title', 'Edit Academic Course Page')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.academic-course-pages.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Edit Academic Course Page</h2>
        <p class="admin-page-subtitle">Update page content for academic course section.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.academic-course-pages.update', $academicCoursePage) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-book-open"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Content</p>
                    <p class="form-card-subtitle">Page title, slug and introduction</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="slug">Slug <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="slug" id="slug"
                               value="{{ old('slug', $academicCoursePage->slug) }}"
                               required class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('slug'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('slug') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="css_prefix">CSS Prefix</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-code icon"></i>
                        <input type="text" name="css_prefix" id="css_prefix"
                               value="{{ old('css_prefix', $academicCoursePage->css_prefix) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="kicker_text">Kicker Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="kicker_text" id="kicker_text"
                               value="{{ old('kicker_text', $academicCoursePage->kicker_text) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_title">Hero Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="hero_title" id="hero_title"
                               value="{{ old('hero_title', $academicCoursePage->hero_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_description">Hero Description</label>
                    <textarea name="hero_description" id="hero_description" rows="4"
                              class="field-textarea">{{ old('hero_description', $academicCoursePage->hero_description) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>

                <div>
                    <p class="form-card-title">Summary Card</p>
                    <p class="form-card-subtitle">Left overview content and stats</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="summary_label">Summary Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-info-circle icon"></i>
                        <input type="text" name="summary_label" id="summary_label"
                               value="{{ old('summary_label', $academicCoursePage->summary_label) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="summary_title">Summary Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="summary_title" id="summary_title"
                               value="{{ old('summary_title', $academicCoursePage->summary_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="summary_description">Summary Description</label>
                    <textarea name="summary_description" id="summary_description" rows="5"
                              class="field-textarea">{{ old('summary_description', $academicCoursePage->summary_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Summary Stats</label>

                    @for($i = 0; $i < 3; $i++)
                        <div class="row g-2" style="margin-bottom:10px;">
                            <div class="col-md-5">
                                <div class="input-icon-wrap">
                                    <i class="fas fa-chart-line icon"></i>
                                    <input type="text" name="summary_stats[{{ $i }}][value]"
                                           value="{{ old('summary_stats.' . $i . '.value', data_get($academicCoursePage->summary_stats, $i . '.value')) }}"
                                           class="field-input">
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="input-icon-wrap">
                                    <i class="fas fa-tag icon"></i>
                                    <input type="text" name="summary_stats[{{ $i }}][label]"
                                           value="{{ old('summary_stats.' . $i . '.label', data_get($academicCoursePage->summary_stats, $i . '.label')) }}"
                                           class="field-input">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="field-group">
                    <label class="field-label" for="note_title">Note Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sticky-note icon"></i>
                        <input type="text" name="note_title" id="note_title"
                               value="{{ old('note_title', $academicCoursePage->note_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="note_description">Note Description</label>
                    <textarea name="note_description" id="note_description" rows="3"
                              class="field-textarea">{{ old('note_description', $academicCoursePage->note_description) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Panel & Table</p>
                    <p class="form-card-subtitle">Right panel and table heading details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="panel_label">Panel Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="panel_label" id="panel_label"
                               value="{{ old('panel_label', $academicCoursePage->panel_label) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="panel_title">Panel Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="panel_title" id="panel_title"
                               value="{{ old('panel_title', $academicCoursePage->panel_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="button_text">Button Text</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-mouse-pointer icon"></i>
                                <input type="text" name="button_text" id="button_text"
                                       value="{{ old('button_text', $academicCoursePage->button_text) }}"
                                       class="field-input">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="button_url">Button URL</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-link icon"></i>
                                <input type="text" name="button_url" id="button_url"
                                       value="{{ old('button_url', $academicCoursePage->button_url) }}"
                                       class="field-input">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="table_label">Table Label</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-table icon"></i>
                        <input type="text" name="table_label" id="table_label"
                               value="{{ old('table_label', $academicCoursePage->table_label) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="table_title">Table Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="table_title" id="table_title"
                               value="{{ old('table_title', $academicCoursePage->table_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="download_button_text">Download Button Text</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-download icon"></i>
                                <input type="text" name="download_button_text" id="download_button_text"
                                       value="{{ old('download_button_text', $academicCoursePage->download_button_text) }}"
                                       class="field-input">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label" for="download_button_url">Download Button URL</label>
                            <div class="input-icon-wrap">
                                <i class="fas fa-link icon"></i>
                                <input type="text" name="download_button_url" id="download_button_url"
                                       value="{{ old('download_button_url', $academicCoursePage->download_button_url) }}"
                                       class="field-input">
                            </div>
                        </div>
                    </div>
                </div>

                <label class="role-checkbox-item {{ old('status', $academicCoursePage->status) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $academicCoursePage->status) ? 'checked' : '' }}>
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

        <a href="{{ route('admin.academic-course-pages.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection