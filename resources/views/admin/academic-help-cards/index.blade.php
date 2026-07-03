@extends('layouts.admin')

@section('page-title', 'Academic Help Cards')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Academic Help Cards</h2>
        <p class="admin-page-subtitle">Manage documents, admission notice and helpdesk cards.</p>
    </div>

    @can('academic_help_card_create')
        <a href="{{ route('admin.academic-help-cards.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Help Card
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Cards</p>
        <p class="stat-value">{{ $helpCards->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $helpCards->where('status', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $helpCards->where('status', false)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Pages</p>
        <p class="stat-value">{{ $helpCards->pluck('academic_course_page_id')->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Help Cards</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AcademicHelpCard">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Page</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($helpCards as $card)
                    <tr data-entry-id="{{ $card->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $card->id }}</span></td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color = $colors[$card->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($card->title ?? 'H', 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $card->title }}</p>
                                    <p class="table-sub-text">{{ Str::limit($card->description, 45) }}</p>
                                </div>
                            </div>
                        </td>

                        <td><span class="role-tag">{{ $card->page->hero_title ?? '—' }}</span></td>
                        <td style="color:#475569;">{{ $card->icon_class }}</td>

                        <td>
                            @if($card->status)
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
                                @can('academic_help_card_edit')
                                    <a href="{{ route('admin.academic-help-cards.edit', $card->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('academic_help_card_delete')
                                    <form action="{{ route('admin.academic-help-cards.destroy', $card->id) }}"
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
    initAdminDataTable('.datatable-AcademicHelpCard', {
        canDelete: @can('academic_help_card_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.academic-help-cards.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search help cards...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ cards'
    });
});
</script>
@endsection