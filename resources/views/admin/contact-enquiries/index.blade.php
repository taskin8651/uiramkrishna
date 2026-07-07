@extends('layouts.admin')

@section('page-title', 'Contact Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact Enquiries</h2>
        <p class="admin-page-subtitle">Website contact form se aaye hue enquiries ko manage karein.</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Enquiries</p>
        <p class="stat-value">{{ $enquiries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Unread</p>
        <p class="stat-value">{{ $enquiries->where('is_read', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Read</p>
        <p class="stat-value">{{ $enquiries->where('is_read', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">
            {{ $enquiries->filter(fn($item) => $item->created_at && $item->created_at->isToday())->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Contact Enquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Latest enquiries first
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ContactEnquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($enquiries as $enquiry)
                    <tr data-entry-id="{{ $enquiry->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $enquiry->id }}</span>
                        </td>

                        <td>
                            <p class="table-main-text">{{ $enquiry->name }}</p>

                            @if($enquiry->email)
                                <p class="table-sub-text">
                                    <i class="fas fa-envelope"></i>
                                    {{ $enquiry->email }}
                                </p>
                            @endif
                        </td>

                        <td>
                            @if($enquiry->phone)
                                <span style="font-size:13px;color:#334155;">
                                    <i class="fas fa-phone-alt"></i>
                                    {{ $enquiry->phone }}
                                </span>
                            @else
                                <span style="font-size:13px;color:#94a3b8;">N/A</span>
                            @endif
                        </td>

                        <td>
                            <p class="table-main-text">
                                {{ $enquiry->subject ?: 'No Subject' }}
                            </p>

                            <p class="table-sub-text">
                                {{ \Illuminate\Support\Str::limit($enquiry->message, 60) }}
                            </p>
                        </td>

                        <td>
                            @if($enquiry->is_read)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px;color:#374151;">Read</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px;color:#92400E;">Unread</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <span style="font-size:13px;color:#475569;">
                                {{ $enquiry->created_at ? $enquiry->created_at->format('d M Y') : '-' }}
                            </span>

                            <p class="table-sub-text">
                                {{ $enquiry->created_at ? $enquiry->created_at->format('h:i A') : '' }}
                            </p>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('contact_enquiry_show')
                                    <a href="{{ route('admin.contact-enquiries.show', $enquiry->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('contact_enquiry_delete')
                                    <form action="{{ route('admin.contact-enquiries.destroy', $enquiry->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @csrf
                                        @method('DELETE')

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
    initAdminDataTable('.datatable-ContactEnquiry', {
        canDelete: @can('contact_enquiry_delete') true @else false @endcan,
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search enquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ enquiries'
    });
});
</script>
@endsection