@extends('layouts.admin')

@section('page-title', 'Downloads')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Downloads</h2>
        <p class="admin-page-subtitle">Manage downloadable files, forms, syllabus, notices and documents.</p>
    </div>

    @can('download_item_create')
        <a href="{{ route('admin.download-items.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Download
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Downloads</p>
        <p class="stat-value">{{ $downloadItems->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $downloadItems->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $downloadItems->where('is_featured', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Categories</p>
        <p class="stat-value">{{ $downloadItems->pluck('download_category_id')->filter()->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Download Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DownloadItem">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Download</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($downloadItems as $downloadItem)
                    <tr data-entry-id="{{ $downloadItem->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $downloadItem->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color = $colors[$downloadItem->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($downloadItem->title ?? 'D', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $downloadItem->title }}</p>
                                    <p class="table-sub-text">
                                        {{ $downloadItem->description ? \Illuminate\Support\Str::limit($downloadItem->description, 45) : 'Download Item' }}
                                    </p>

                                    @if($downloadItem->is_featured)
                                        <span class="role-tag">Featured</span>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $downloadItem->slug ?: '—' }}
                        </td>

                        <td>
                            <span class="role-tag">{{ $downloadItem->category->name ?? '—' }}</span>
                        </td>

                        <td style="color:#475569;">
                            {{ $downloadItem->year ?: '—' }}
                        </td>

                        <td>
                            @if($downloadItem->download_file_url)
                                <a href="{{ $downloadItem->download_file_url }}"
                                   target="_blank"
                                   class="btn-outline">
                                    <i class="fas fa-download"></i>
                                    Uploaded
                                </a>

                                @if($downloadItem->download_file_size)
                                    <p class="table-sub-text" style="margin-top:6px;">
                                        {{ $downloadItem->download_file_size }}
                                    </p>
                                @endif
                            @elseif($downloadItem->external_url)
                                <a href="{{ $downloadItem->external_url }}"
                                   target="_blank"
                                   class="btn-outline">
                                    <i class="fas fa-link"></i>
                                    External
                                </a>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">No file</span>
                            @endif
                        </td>

                        <td>
                            @if($downloadItem->status)
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
                                @can('download_item_edit')
                                    <a href="{{ route('admin.download-items.edit', $downloadItem->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('download_item_delete')
                                    <form action="{{ route('admin.download-items.destroy', $downloadItem->id) }}"
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
    initAdminDataTable('.datatable-DownloadItem', {
        canDelete: @can('download_item_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.download-items.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search downloads...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ downloads'
    });
});
</script>
@endsection
