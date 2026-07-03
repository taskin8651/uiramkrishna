@extends('layouts.admin')

@section('page-title', 'Academic Info Pages')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Academic Info Pages</h2>
        <p class="admin-page-subtitle">Manage PO & PSO, alumni and similar academic information pages.</p>
    </div>

    @can('academic_info_page_create')
        <a href="{{ route('admin.academic-info-pages.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Info Page
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Pages</p>
        <p class="stat-value">{{ $academicInfoPages->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $academicInfoPages->where('status', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $academicInfoPages->where('status', false)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Cards</p>
        <p class="stat-value">{{ $academicInfoPages->sum(fn ($page) => count($page->cards ?? [])) }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Info Pages</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AcademicInfoPage">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($academicInfoPages as $academicInfoPage)
                    <tr data-entry-id="{{ $academicInfoPage->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $academicInfoPage->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $academicInfoPage->hero_title ?: $academicInfoPage->section_title ?: $academicInfoPage->slug }}</p>
                            <p class="table-sub-text">{{ $academicInfoPage->kicker_text ?: 'Academic Info Page' }}</p>
                        </td>
                        <td><span class="role-tag">{{ $academicInfoPage->slug }}</span></td>
                        <td>
                            @if($academicInfoPage->status)
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
                                @can('academic_info_page_edit')
                                    <a href="{{ route('admin.academic-info-pages.edit', $academicInfoPage->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('academic_info_page_delete')
                                    <form action="{{ route('admin.academic-info-pages.destroy', $academicInfoPage->id) }}"
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
    initAdminDataTable('.datatable-AcademicInfoPage', {
        canDelete: @can('academic_info_page_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.academic-info-pages.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search info pages...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ info pages'
    });
});
</script>
@endsection
