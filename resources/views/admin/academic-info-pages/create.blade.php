@extends('layouts.admin')

@section('page-title', 'Add Academic Info Page')

@section('content')

@php
    $cards = old('cards', array_fill(0, 3, ['icon' => '', 'title' => '', 'description' => '']));
    $tableRows = old('table_rows', array_fill(0, 3, ['title' => '', 'details' => '']));
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.academic-info-pages.index') }}" class="admin-back-link">
            &larr; Back to List
        </a>

        <h2 class="admin-page-title">Add Academic Info Page</h2>
        <p class="admin-page-subtitle">Create PO & PSO, alumni or similar academic content.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.academic-info-pages.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-file-alt"></i></div>
                <div>
                    <p class="form-card-title">Hero Content</p>
                    <p class="form-card-subtitle">Page slug and hero section text</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="slug">Slug <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('slug'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('slug') }}</p>
                    @endif
                </div>

                @foreach(['kicker_text' => 'Kicker Text', 'hero_title' => 'Hero Title'] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-heading icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field) }}" class="field-input">
                        </div>
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label" for="hero_description">Hero Description</label>
                    <textarea name="hero_description" id="hero_description" rows="5" class="field-textarea">{{ old('hero_description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-align-left"></i></div>
                <div>
                    <p class="form-card-title">Section Content</p>
                    <p class="form-card-subtitle">Main support section text</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach(['section_label' => 'Section Label', 'section_title' => 'Section Title'] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-tag icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field) }}" class="field-input">
                        </div>
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label" for="section_description">Section Description</label>
                    <textarea name="section_description" id="section_description" rows="5" class="field-textarea">{{ old('section_description') }}</textarea>
                </div>

                <label class="role-checkbox-item {{ old('status', true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show on website</span>
                </label>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-th-large"></i></div>
                <div>
                    <p class="form-card-title">Cards</p>
                    <p class="form-card-subtitle">Icon, title and description rows</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($cards as $index => $card)
                    <div class="field-group">
                        <label class="field-label">Card {{ $index + 1 }}</label>
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-icons icon"></i>
                            <input type="text" name="cards[{{ $index }}][icon]" value="{{ data_get($card, 'icon') }}" placeholder="bi bi-info-circle-fill" class="field-input">
                        </div>
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-heading icon"></i>
                            <input type="text" name="cards[{{ $index }}][title]" value="{{ data_get($card, 'title') }}" placeholder="Title" class="field-input">
                        </div>
                        <textarea name="cards[{{ $index }}][description]" rows="3" placeholder="Description" class="field-textarea">{{ data_get($card, 'description') }}</textarea>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-table"></i></div>
                <div>
                    <p class="form-card-title">Table Rows</p>
                    <p class="form-card-subtitle">Optional title and detail rows</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($tableRows as $index => $row)
                    <div class="field-group">
                        <label class="field-label">Table Row {{ $index + 1 }}</label>
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-heading icon"></i>
                            <input type="text" name="table_rows[{{ $index }}][title]" value="{{ data_get($row, 'title') }}" placeholder="Title" class="field-input">
                        </div>
                        <textarea name="table_rows[{{ $index }}][details]" rows="3" placeholder="Details" class="field-textarea">{{ data_get($row, 'details') }}</textarea>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i> Save</button>
        <a href="{{ route('admin.academic-info-pages.index') }}" class="btn-ghost">Cancel</a>
    </div>
</form>

@endsection
