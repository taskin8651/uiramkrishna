@extends('layouts.admin')

@section('page-title', 'Academic Courses')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Academic Courses</h2>
        <p class="admin-page-subtitle">Manage course cards and table rows for academic pages.</p>
    </div>

    @can('academic_course_create')
        <a href="{{ route('admin.academic-courses.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Course
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Courses</p>
        <p class="stat-value">{{ $courses->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $courses->where('status', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $courses->where('status', false)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Pages</p>
        <p class="stat-value">{{ $courses->pluck('academic_course_page_id')->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Courses</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AcademicCourse">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Page</th>
                    <th>Duration</th>
                    <th>Eligibility</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($courses as $course)
                    <tr data-entry-id="{{ $course->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $course->id }}</span></td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color = $colors[$course->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($course->course_name ?? 'C', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $course->course_name }}</p>
                                    <p class="table-sub-text">{{ $course->stream_label ?? 'Course' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ $course->page->hero_title ?? '—' }}</span>
                        </td>

                        <td style="color:#475569;">{{ $course->duration }}</td>
                        <td style="color:#475569;">{{ $course->eligibility }}</td>

                        <td>
                            @if($course->status)
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
                                @can('academic_course_edit')
                                    <a href="{{ route('admin.academic-courses.edit', $course->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('academic_course_delete')
                                    <form action="{{ route('admin.academic-courses.destroy', $course->id) }}"
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
    initAdminDataTable('.datatable-AcademicCourse', {
        canDelete: @can('academic_course_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.academic-courses.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search courses...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ courses'
    });
});
</script>
@endsection