@extends('layouts.admin')

@section('page-title', 'Ex Principals')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Ex Principals</h2>
        <p class="admin-page-subtitle">
            Manage former principals, incharge principals and current principal records
        </p>
    </div>

    @can('college_ex_principal_create')
        <a href="{{ route('admin.college-ex-principals.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Record
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Records</p>
        <p class="stat-value">{{ $principals->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Principals</p>
        <p class="stat-value">{{ $principals->where('post_type', 'principal')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Incharge</p>
        <p class="stat-value">{{ $principals->where('post_type', 'incharge')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Current</p>
        <p class="stat-value">{{ $principals->where('is_current', true)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Ex Principals</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CollegeExPrincipal">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Sl. No.</th>
                    <th>Name</th>
                    <th>Post</th>
                    <th>Period</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($principals as $principal)
                    <tr data-entry-id="{{ $principal->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $principal->id }}</span>
                        </td>

                        <td>
                            <span class="id-text">{{ $principal->sort_order }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$principal->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($principal->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $principal->name }}</p>

                                    @if($principal->is_current)
                                        <p class="table-sub-text">Current Principal</p>
                                    @else
                                        <p class="table-sub-text">Former Record</p>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="tag-wrap">
                                @if($principal->is_current)
                                    <span class="role-tag">Current Principal</span>
                                @elseif($principal->post_type === 'incharge')
                                    <span class="role-tag">Incharge</span>
                                @else
                                    <span class="role-tag">Principal</span>
                                @endif
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $principal->period }}
                        </td>

                        <td>
                            @if($principal->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">
                                        Active
                                    </span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">
                                        Inactive
                                    </span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('college_ex_principal_edit')
                                    <a href="{{ route('admin.college-ex-principals.edit', $principal->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('college_ex_principal_delete')
                                    <form action="{{ route('admin.college-ex-principals.destroy', $principal->id) }}"
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
    initAdminDataTable('.datatable-CollegeExPrincipal', {
        canDelete: @can('college_ex_principal_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.college-ex-principals.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search principal records...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ records'
    });
});
</script>
@endsection