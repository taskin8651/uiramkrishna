@extends('layouts.admin')

@section('page-title', 'Download Categories')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Download Categories</h2>
        <p class="admin-page-subtitle">Manage categories for downloadable files.</p>
    </div>

    @can('download_category_create')
        <a href="{{ route('admin.download-categories.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Category
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Categories</p>
        <p class="stat-value">{{ $categories->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $categories->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $categories->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Downloads</p>
        <p class="stat-value">{{ $categories->sum('downloads_count') }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Download Categories</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DownloadCategory">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Downloads</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $category->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color = $colors[$category->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($category->name ?? 'D', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $category->name }}</p>
                                    <p class="table-sub-text">Sort: {{ $category->sort_order }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $category->slug }}
                        </td>

                        <td>
                            <span class="role-tag">{{ $category->downloads_count }}</span>
                        </td>

                        <td>
                            @if($category->status)
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
                                @can('download_category_edit')
                                    <a href="{{ route('admin.download-categories.edit', $category->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('download_category_delete')
                                    <form action="{{ route('admin.download-categories.destroy', $category->id) }}"
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
    initAdminDataTable('.datatable-DownloadCategory', {
        canDelete: @can('download_category_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.download-categories.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search categories...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ categories'
    });
});
</script>
@endsection