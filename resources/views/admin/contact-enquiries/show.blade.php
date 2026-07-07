@extends('layouts.admin')

@section('page-title', 'Contact Enquiry Detail')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-enquiries.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Contact Enquiry Detail</h2>
        <p class="admin-page-subtitle">Website contact form se submitted query ki complete details.</p>
    </div>

    <div class="show-actions">
        @can('contact_enquiry_delete')
            <form action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry->id) }}"
                  method="POST"
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
</div>

<div class="show-grid">

    <div class="detail-card">
        <div class="profile-hero">

            <div class="profile-avatar-lg">
                {{ strtoupper(substr($contactEnquiry->name, 0, 1)) }}
            </div>

            <div>
                <h3 class="profile-title">{{ $contactEnquiry->name }}</h3>

                <p class="profile-subtitle">
                    {{ $contactEnquiry->subject ?: 'No Subject' }}
                </p>

                @if($contactEnquiry->is_read)
                    <span class="status-pill active">
                        <i class="fas fa-check-circle"></i>
                        Read
                    </span>
                @else
                    <span class="status-pill inactive">
                        <i class="fas fa-envelope"></i>
                        Unread
                    </span>
                @endif
            </div>

        </div>

        <div class="detail-section-pad-sm">
            <p class="quick-title">Quick Info</p>

            <div class="stat-mini">
                <span>
                    <i class="fas fa-calendar-alt"></i>
                    Submitted Date
                </span>

                <strong>
                    {{ $contactEnquiry->created_at ? $contactEnquiry->created_at->format('d M Y, h:i A') : '-' }}
                </strong>
            </div>

            <div class="stat-mini">
                <span>
                    <i class="fas fa-envelope"></i>
                    Email
                </span>

                <strong>
                    {{ $contactEnquiry->email ?: '-' }}
                </strong>
            </div>

            <div class="stat-mini">
                <span>
                    <i class="fas fa-phone-alt"></i>
                    Contact No.
                </span>

                <strong>
                    {{ $contactEnquiry->phone ?: '-' }}
                </strong>
            </div>
        </div>
    </div>


    <div class="detail-card">
        <div class="detail-card-header">
            <div>
                <p class="detail-card-title">Enquiry Information</p>
                <p class="detail-card-subtitle">Full submitted contact form details</p>
            </div>
        </div>

        <div class="detail-section-pad-sm">

            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-user"></i>
                    Name
                </span>

                <span class="detail-value">
                    {{ $contactEnquiry->name }}
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-envelope"></i>
                    Email
                </span>

                <span class="detail-value">
                    @if($contactEnquiry->email)
                        <a href="mailto:{{ $contactEnquiry->email }}">
                            {{ $contactEnquiry->email }}
                        </a>
                    @else
                        -
                    @endif
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-phone-alt"></i>
                    Contact No.
                </span>

                <span class="detail-value">
                    @if($contactEnquiry->phone)
                        <a href="tel:{{ $contactEnquiry->phone }}">
                            {{ $contactEnquiry->phone }}
                        </a>
                    @else
                        -
                    @endif
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-heading"></i>
                    Subject
                </span>

                <span class="detail-value">
                    {{ $contactEnquiry->subject ?: '-' }}
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-clock"></i>
                    Submitted At
                </span>

                <span class="detail-value">
                    {{ $contactEnquiry->created_at ? $contactEnquiry->created_at->format('d M Y, h:i A') : '-' }}
                </span>
            </div>

        </div>
    </div>


    <div class="detail-card" style="grid-column:1 / -1;">
        <div class="detail-card-header">
            <div>
                <p class="detail-card-title">Message / Query</p>
                <p class="detail-card-subtitle">User ne jo message submit kiya hai</p>
            </div>
        </div>

        <div class="detail-section-pad-sm">
            <div style="padding:18px;border-radius:18px;background:#f8fafc;border:1px solid #e5e7eb;color:#334155;line-height:1.8;font-size:14px;">
                {!! nl2br(e($contactEnquiry->message)) !!}
            </div>
        </div>
    </div>

</div>

@endsection