@extends('layouts.admin')

@section('page-title', 'Department Streams')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Department Streams</h2>
        <p class="admin-page-subtitle">Manage Social Science, Humanities, Science, Commerce and Vocational streams.</p>
    </div>

    @can('department_stream_create')
        <a href="{{ route('admin.department-streams.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Stream
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Streams</p>
        <p class="stat-value">{{ $streams->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $streams->where('status', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $streams->where('status', false)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Departments</p>
        <p class="stat-value">{{ $streams->sum('departments_count') }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Department Streams</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DepartmentStream">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Stream</th>
                    <th>Faculty Label</th>
                    <th>Type</th>
                    <th>Departments</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($streams as $stream)
                    <tr data-entry-id="{{ $stream->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $stream->id }}</span></td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color = $colors[$stream->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($stream->name ?? 'D', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $stream->name }}</p>
                                    <p class="table-sub-text">{{ $stream->description ? Str::limit($stream->description, 45) : 'Department Stream' }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">{{ $stream->faculty_label }}</td>
                        <td><span class="role-tag">{{ $stream->type_label ?? '—' }}</span></td>
                        <td><span class="role-tag">{{ $stream->departments_count }}</span></td>

                        <td>
                            @if($stream->status)
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
                                @can('department_stream_edit')
                                    <a href="{{ route('admin.department-streams.edit', $stream->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('department_stream_delete')
                                    <form action="{{ route('admin.department-streams.destroy', $stream->id) }}"
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
    initAdminDataTable('.datatable-DepartmentStream', {
        canDelete: @can('department_stream_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.department-streams.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search streams...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ streams'
    });
});
</script>
@endsection