@extends('layouts.admin')

@section('page-title', 'Add Quality Document Page')

@section('content')

@php
    $pageOptions = [
        'aqar' => 'AQAR',
        'iqac' => 'IQAC',
        'ict' => 'ICT',
        'naac' => 'NAAC',
        'ssr' => 'SSR',
    ];

    $pdfRows = old('pdf_items', [['title' => '', 'description' => '']]);
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.quality-document-pages.index') }}" class="admin-back-link">
            Back to List
        </a>

        <h2 class="admin-page-title">Add Quality Document Page</h2>
        <p class="admin-page-subtitle">Page select karo, phir us page ke documents upload karo.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.quality-document-pages.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <p class="form-card-title">Page</p>
                    <p class="form-card-subtitle">Jis page par documents dikhane hain woh select karo</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Select Page <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <select name="slug" required class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                            <option value="">Select page</option>
                            @foreach($pageOptions as $slug => $label)
                                <option value="{{ $slug }}" {{ old('slug') === $slug ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <p class="field-hint">Slug selected page se automatic set hoga.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Page Heading</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="card_title" value="{{ old('card_title') }}" placeholder="AQAR Reports" class="field-input">
                    </div>
                    <p class="field-hint">Blank chhodne par default heading automatic lagegi.</p>
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
                <div class="form-card-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <div>
                    <p class="form-card-title">Documents</p>
                    <p class="form-card-subtitle">Har PDF/image ke liye ek row add karo</p>
                </div>
            </div>

            <div class="form-card-body">
                <div id="documentRows">
                    @foreach($pdfRows as $i => $item)
                        <div class="document-row" data-index="{{ $i }}" style="padding:16px;border:1px solid #e5e7eb;border-radius:10px;margin-bottom:14px;background:#fafafa;">
                            <p class="field-label" style="margin-bottom:12px;">Document {{ $i + 1 }}</p>

                            <div class="field-group">
                                <label class="field-label">Title</label>
                                <div class="input-icon-wrap">
                                    <i class="fas fa-heading icon"></i>
                                    <input type="text" name="pdf_items[{{ $i }}][title]" value="{{ data_get($item, 'title') }}" placeholder="AQAR 2021-22" class="field-input">
                                </div>
                            </div>

                            <div class="field-group">
                                <label class="field-label">Description</label>
                                <div class="input-icon-wrap">
                                    <i class="fas fa-align-left icon"></i>
                                    <input type="text" name="pdf_items[{{ $i }}][description]" value="{{ data_get($item, 'description') }}" placeholder="YEARLY STATUS REPORT - 2021-2022" class="field-input">
                                </div>
                            </div>

                            <div class="field-group">
                                <label class="field-label">PDF / Image Upload</label>
                                <div class="input-icon-wrap">
                                    <i class="fas fa-upload icon"></i>
                                    <input type="file" name="pdf_items[{{ $i }}][file]" accept=".pdf,image/*" class="field-input">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="addDocumentRow" class="btn-ghost">
                    <i class="fas fa-plus"></i>
                    Add Document
                </button>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save
        </button>

        <a href="{{ route('admin.quality-document-pages.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection

@section('scripts')
@parent
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var rows = document.getElementById('documentRows');
        var addButton = document.getElementById('addDocumentRow');
        var nextIndex = {{ count($pdfRows) }};

        addButton.addEventListener('click', function () {
            var row = document.createElement('div');
            row.className = 'document-row';
            row.dataset.index = nextIndex;
            row.style.cssText = 'padding:16px;border:1px solid #e5e7eb;border-radius:10px;margin-bottom:14px;background:#fafafa;';
            row.innerHTML =
                '<p class="field-label" style="margin-bottom:12px;">Document ' + (nextIndex + 1) + '</p>' +
                '<div class="field-group"><label class="field-label">Title</label><div class="input-icon-wrap"><i class="fas fa-heading icon"></i><input type="text" name="pdf_items[' + nextIndex + '][title]" class="field-input"></div></div>' +
                '<div class="field-group"><label class="field-label">Description</label><div class="input-icon-wrap"><i class="fas fa-align-left icon"></i><input type="text" name="pdf_items[' + nextIndex + '][description]" class="field-input"></div></div>' +
                '<div class="field-group"><label class="field-label">PDF / Image Upload</label><div class="input-icon-wrap"><i class="fas fa-upload icon"></i><input type="file" name="pdf_items[' + nextIndex + '][file]" accept=".pdf,image/*" class="field-input"></div></div>';

            rows.appendChild(row);
            nextIndex++;
        });
    });
</script>
@endsection
