@extends('frontend.master')

@section('content')

<section class="staff-hero-section">
    <div class="staff-hero-shape staff-hero-shape-1"></div>
    <div class="staff-hero-shape staff-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="staff-hero-content text-center">

            <span class="staff-kicker">
                <i class="bi bi-person-video3"></i>
                Academics
            </span>

            <h1>Staff / Faculty</h1>

            <p>
                Faculty and staff profile details of Ram Krishna Dwarika College, Patna.
            </p>

            <nav class="staff-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Academics</a>
                <i class="bi bi-chevron-right"></i>
                <span>Staff / Faculty</span>
            </nav>

        </div>
    </div>
</section>


<section class="staff-page-section">
    <div class="container">

        <div class="section-title text-center">
            <span>
                <i class="bi bi-people-fill"></i>
                Faculty Members
            </span>

            <h2>Our Academic Team</h2>

            <p>
                Department-wise faculty and staff profiles supporting academic development.
            </p>
        </div>

        <div class="row g-4">

            @forelse($staffMembers as $staff)
                <div class="col-lg-4 col-md-6">
                    <div class="staff-profile-card h-100">

                        <div class="staff-profile-img">
                            @if($staff->staff_image_url)
                                <img src="{{ $staff->staff_image_url }}" alt="{{ $staff->name }}">
                            @else
                                <div class="staff-profile-placeholder">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            @endif
                        </div>

                        <div class="staff-profile-content">

                            <span>
                                <i class="bi bi-building"></i>
                                {{ $staff->department->name ?? 'Department' }}
                            </span>

                            <h4>{{ $staff->name }}</h4>

                            @if($staff->designation)
                                <p class="staff-designation">
                                    {{ $staff->designation }}
                                </p>
                            @endif

                            @if($staff->qualification)
                                <p class="staff-qualification">
                                    <i class="bi bi-mortarboard-fill"></i>
                                    {{ $staff->qualification }}
                                </p>
                            @endif

                            @if($staff->bio)
                                <p>
                                    {{ $staff->bio }}
                                </p>
                            @endif

                            <div class="staff-contact-list">
                                @if($staff->email)
                                    <a href="mailto:{{ $staff->email }}">
                                        <i class="bi bi-envelope-fill"></i>
                                        {{ $staff->email }}
                                    </a>
                                @endif

                                @if($staff->phone)
                                    <a href="tel:{{ $staff->phone }}">
                                        <i class="bi bi-telephone-fill"></i>
                                        {{ $staff->phone }}
                                    </a>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="staff-empty-card text-center">
                        <i class="bi bi-info-circle-fill"></i>
                        <h4>Staff details will be updated soon.</h4>
                        <p>Please visit again later for faculty and staff profile information.</p>
                    </div>
                </div>
            @endforelse

        </div>

    </div>
</section>

@endsection