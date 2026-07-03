@extends('layouts.admin')

@section('page-title', 'Departments')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Departments</h2>
        <p class="admin-page-subtitle">Manage stream-wise academic departments and subjects.</p>
    </div>

    @can('department_create')
        <a href="{{ route('admin.departments.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Department
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Departments</p>
        <p class="stat-value">{{ $departments->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $departments->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $departments->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Streams</p>
        <p class="stat-value">{{ $departments->pluck('department_stream_id')->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Departments</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Department">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Department</th>
                    <th>Stream</th>
                    <th>Slug</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departments as $department)
                    <tr data-entry-id="{{ $department->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $department->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color = $colors[$department->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($department->name ?? 'D', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $department->name }}</p>
                                    <p class="table-sub-text">Sort: {{ $department->sort_order }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ $department->stream->name ?? '—' }}</span>
                        </td>

                        <td style="color:#475569;">
                            {{ $department->slug }}
                        </td>

                        <td style="color:#475569;">
                            {{ $department->link_url ?: '—' }}
                        </td>

                        <td>
                            @if($department->status)
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
                                @can('department_edit')
                                    <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('department_delete')
                                    <form action="{{ route('admin.departments.destroy', $department->id) }}"
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
    initAdminDataTable('.datatable-Department', {
        canDelete: @can('department_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.departments.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search departments...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ departments'
    });
});
</script>
@endsection