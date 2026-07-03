@extends('layouts.admin')

@section('page-title', 'Academic Course Pages')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Academic Course Pages</h2>
        <p class="admin-page-subtitle">Manage Senior Secondary, UG, PG and Vocational course page content.</p>
    </div>

    @can('academic_course_page_create')
        <a href="{{ route('admin.academic-course-pages.create') }}" class="btn-primary">
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
        <p class="stat-label">Courses</p>
        <p class="stat-value">{{ $pages->sum('courses_count') }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Help Cards</p>
        <p class="stat-value">{{ $pages->sum('help_cards_count') }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Course Pages</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AcademicCoursePage">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Page</th>
                    <th>Slug</th>
                    <th>Courses</th>
                    <th>Help Cards</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pages as $page)
                    <tr data-entry-id="{{ $page->id }}">
                        <td></td>

                        <td><span class="id-text">#{{ $page->id }}</span></td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color = $colors[$page->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($page->hero_title ?? 'A', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $page->hero_title }}</p>
                                    <p class="table-sub-text">{{ $page->kicker_text ?? 'Academics' }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">{{ $page->slug }}</td>

                        <td>
                            <span class="role-tag">{{ $page->courses_count }}</span>
                        </td>

                        <td>
                            <span class="role-tag">{{ $page->help_cards_count }}</span>
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
                                @can('academic_course_page_edit')
                                    <a href="{{ route('admin.academic-course-pages.edit', $page->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('academic_course_page_delete')
                                    <form action="{{ route('admin.academic-course-pages.destroy', $page->id) }}"
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
    initAdminDataTable('.datatable-AcademicCoursePage', {
        canDelete: @can('academic_course_page_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.academic-course-pages.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search course pages...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ pages'
    });
});
</script>
@endsection