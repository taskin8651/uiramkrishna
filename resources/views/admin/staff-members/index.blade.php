@extends('layouts.admin')

@section('page-title', 'Staff / Faculty')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Staff / Faculty</h2>
        <p class="admin-page-subtitle">Manage faculty and staff profiles with department mapping.</p>
    </div>

    @can('staff_member_create')
        <a href="{{ route('admin.staff-members.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Staff
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Staff</p>
        <p class="stat-value">{{ $staffMembers->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $staffMembers->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $staffMembers->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Departments</p>
        <p class="stat-value">{{ $staffMembers->pluck('department_id')->filter()->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Staff Members</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-StaffMember">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Staff</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($staffMembers as $staffMember)
                    <tr data-entry-id="{{ $staffMember->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $staffMember->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @if($staffMember->staff_image_url)
                                    <img src="{{ $staffMember->staff_image_url }}"
                                         alt="{{ $staffMember->name }}"
                                         class="avatar-circle"
                                         style="object-fit:cover;">
                                @else
                                    @php
                                        $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                        $color = $colors[$staffMember->id % count($colors)];
                                    @endphp

                                    <div class="avatar-circle" style="background: {{ $color }};">
                                        {{ strtoupper(substr($staffMember->name ?? 'S', 0, 1)) }}
                                    </div>
                                @endif

                                <div>
                                    <p class="table-main-text">{{ $staffMember->name }}</p>
                                    <p class="table-sub-text">{{ $staffMember->qualification ?: 'Staff / Faculty' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ $staffMember->department->name ?? '—' }}</span>
                        </td>

                        <td style="color:#475569;">
                            {{ $staffMember->designation ?: '—' }}
                        </td>

                        <td style="color:#475569;">
                            @if($staffMember->email)
                                <div>{{ $staffMember->email }}</div>
                            @endif

                            @if($staffMember->phone)
                                <div>{{ $staffMember->phone }}</div>
                            @endif

                            @if(!$staffMember->email && !$staffMember->phone)
                                —
                            @endif
                        </td>

                        <td>
                            @if($staffMember->status)
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
                                @can('staff_member_edit')
                                    <a href="{{ route('admin.staff-members.edit', $staffMember->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('staff_member_delete')
                                    <form action="{{ route('admin.staff-members.destroy', $staffMember->id) }}"
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
    initAdminDataTable('.datatable-StaffMember', {
        canDelete: @can('staff_member_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.staff-members.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search staff...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ staff'
    });
});
</script>
@endsection