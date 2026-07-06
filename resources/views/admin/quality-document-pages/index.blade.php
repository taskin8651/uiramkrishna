@extends('layouts.admin')

@section('page-title', 'Quality Documents')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Quality Documents</h2>
        <p class="admin-page-subtitle">Manage NAAC, AQAR, IQAC, ICT and SSR document pages.</p>
    </div>

    @can('quality_document_page_create')
        <a href="{{ route('admin.quality-document-pages.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Page
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Pages</p>
        <p class="stat-value">{{ $pages->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $pages->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Grid Type</p>
        <p class="stat-value">{{ $pages->where('template_type', 'grid')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Single PDF</p>
        <p class="stat-value">{{ $pages->where('template_type', 'single_pdf')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Quality Document Pages</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-QualityDocumentPage">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Template</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pages as $page)
                    <tr data-entry-id="{{ $page->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $page->id }}</span>
                        </td>

                        <td>
                            <p class="table-main-text">{{ $page->card_title }}</p>
                            <p class="table-sub-text">{{ $page->subtitle_text }}</p>
                        </td>

                        <td style="color:#475569;">
                            {{ $page->slug }}
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $page->template_type === 'single_pdf' ? 'Single PDF' : 'Grid' }}
                            </span>
                        </td>

                        <td>
                            {{ count($page->pdf_items ?? []) }}
                        </td>

                        <td>
                            @if($page->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('quality_document_page_edit')
                                    <a href="{{ route('admin.quality-document-pages.edit', $page->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('quality_document_page_delete')
                                    <form action="{{ route('admin.quality-document-pages.destroy', $page->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-QualityDocumentPage', {
        canDelete: @can('quality_document_page_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.quality-document-pages.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search quality documents...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ pages'
    });
});
</script>
@endsection