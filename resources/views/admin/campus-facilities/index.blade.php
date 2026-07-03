@extends('layouts.admin')

@section('page-title', 'Campus Facilities')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Campus Facilities</h2>
        <p class="admin-page-subtitle">Manage infrastructure facility content like conference room, smart room, seminar hall and canteen.</p>
    </div>

    @can('campus_facility_create')
        <a href="{{ route('admin.campus-facilities.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Facility
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Facilities</p>
        <p class="stat-value">{{ $facilities->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $facilities->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $facilities->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">With Image</p>
        <p class="stat-value">{{ $facilities->filter(fn($item) => $item->facility_image_url)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Campus Facilities</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CampusFacility">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Facility</th>
                    <th>Slug</th>
                    <th>Prefix</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($facilities as $facility)
                    <tr data-entry-id="{{ $facility->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $facility->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @if($facility->facility_image_url)
                                    <img src="{{ $facility->facility_image_url }}"
                                         alt="{{ $facility->image_alt }}"
                                         class="avatar-circle"
                                         style="object-fit:cover;">
                                @else
                                    @php
                                        $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                        $color = $colors[$facility->id % count($colors)];
                                    @endphp

                                    <div class="avatar-circle" style="background: {{ $color }};">
                                        {{ strtoupper(substr($facility->image_title ?? 'C', 0, 1)) }}
                                    </div>
                                @endif

                                <div>
                                    <p class="table-main-text">{{ $facility->image_title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($facility->panel_title, 50) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $facility->slug }}
                        </td>

                        <td>
                            <span class="role-tag">{{ $facility->css_prefix }}</span>
                        </td>

                        <td>
                            @if($facility->status)
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
                                @can('campus_facility_edit')
                                    <a href="{{ route('admin.campus-facilities.edit', $facility->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('campus_facility_delete')
                                    <form action="{{ route('admin.campus-facilities.destroy', $facility->id) }}"
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
    initAdminDataTable('.datatable-CampusFacility', {
        canDelete: @can('campus_facility_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.campus-facilities.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search campus facilities...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ facilities'
    });
});
</script>
@endsection