@extends('frontend.master')

@section('content')

@php
    $totalFaculty = $staffMembers->count();
    $totalDepartments = $staffMembers->pluck('department_id')->filter()->unique()->count();

    $designationTypes = $staffMembers->pluck('designation_type')->filter()->unique()->count();

    $featureCards = [
        [
            'icon' => 'bi bi-award-fill',
            'title' => 'Principal',
            'desc' => 'Institutional academic and administrative leadership.',
        ],
        [
            'icon' => 'bi bi-person-badge-fill',
            'title' => 'Professors',
            'desc' => 'Senior academic faculty supporting departmental growth.',
        ],
        [
            'icon' => 'bi bi-people-fill',
            'title' => 'Associate Professors',
            'desc' => 'Experienced faculty members for subject specialization.',
        ],
        [
            'icon' => 'bi bi-person-workspace',
            'title' => 'Assistant Professors',
            'desc' => 'Teaching faculty for classroom learning and student support.',
        ],
    ];
@endphp

<section class="faculty-hero-section">
    <div class="faculty-hero-shape faculty-hero-shape-1"></div>
    <div class="faculty-hero-shape faculty-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="faculty-hero-content text-center">

            <span class="faculty-kicker">
                <i class="bi bi-person-video3"></i>
                Academic Staff
            </span>

            <h1>Teaching Faculty</h1>

            <p>
                Official teaching faculty list of Ram Krishna Dwarika College, Patna with
                faculty name, designation and department details.
            </p>

            <nav class="faculty-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('frontend.departments') }}">Academics</a>
                <i class="bi bi-chevron-right"></i>
                <span>Teaching Faculty</span>
            </nav>

        </div>
    </div>
</section>


<section class="faculty-overview-section">
    <div class="faculty-bg-shape faculty-bg-shape-1"></div>
    <div class="faculty-bg-shape faculty-bg-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-4">
                <div class="faculty-summary-card h-100">

                    <div class="faculty-summary-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <span>Faculty Overview</span>

                    <h2>Academic Excellence</h2>

                    <p>
                        RKD College has teaching faculty members across Arts, Science,
                        Commerce and Social Science departments to support quality education.
                    </p>

                    <div class="faculty-summary-stats">
                        <div>
                            <strong>{{ $totalFaculty }}</strong>
                            <small>Faculty Records</small>
                        </div>

                        <div>
                            <strong>{{ $totalDepartments }}</strong>
                            <small>Departments</small>
                        </div>

                        <div>
                            <strong>{{ $designationTypes ?: 4 }}</strong>
                            <small>Categories</small>
                        </div>
                    </div>

                    <div class="faculty-info-note">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            <strong>Official Record</strong>
                            <span>Faculty list includes Principal, Professors, Associate Professors, Assistant Professors and Guest Faculty.</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-8">
                <div class="faculty-panel-card h-100">

                    <div class="faculty-panel-head">
                        <div>
                            <span class="faculty-subtitle">
                                <i class="bi bi-diagram-3-fill"></i>
                                Faculty Categories
                            </span>

                            <h2>Academic Team Structure</h2>
                        </div>

                        <a href="{{ route('frontend.departments') }}" class="btn btn-main">
                            View Departments
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="faculty-feature-grid">

                        @foreach($featureCards as $card)
                            <div class="faculty-feature-card">
                                <div class="faculty-feature-icon">
                                    <i class="{{ $card['icon'] }}"></i>
                                </div>

                                <h4>{{ $card['title'] }}</h4>
                                <p>{{ $card['desc'] }}</p>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>

    </div>
</section>


<section class="faculty-table-section">
    <div class="faculty-table-shape faculty-table-shape-1"></div>
    <div class="faculty-table-shape faculty-table-shape-2"></div>

    <div class="container position-relative">

        <div class="faculty-table-card">

            <div class="faculty-table-head">
                <div>
                    <span class="faculty-subtitle">
                        <i class="bi bi-table"></i>
                        Official Faculty List
                    </span>

                    <h2>Faculty Name, Designation & Department</h2>
                </div>

                <a href="{{ route('frontend.non-teaching-staff') }}" class="btn btn-outline-main">
                    Non-Teaching Staff
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="faculty-table-wrap">
                <table class="faculty-data-table">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>Faculty Name</th>
                            <th>Designation</th>
                            <th>Department Name</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($staffMembers as $index => $staff)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>
                                    <span class="faculty-badge {{ $staff->badge_class }}">
                                        {{ $staff->designation }}
                                    </span>
                                </td>
                                <td>{{ $staff->department->name ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center;">
                                    Faculty records will be updated soon.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>


<section class="faculty-support-section">
    <div class="container">

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="faculty-support-card">
                    <i class="bi bi-columns-gap"></i>
                    <h4>Department Wise Faculty</h4>
                    <p>Faculty members support academic departments across Arts, Science, Commerce and Social Science.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="faculty-support-card">
                    <i class="bi bi-journal-check"></i>
                    <h4>Academic Guidance</h4>
                    <p>Students can connect with departments for subject guidance and academic support.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="faculty-support-card">
                    <i class="bi bi-patch-check-fill"></i>
                    <h4>Quality Education</h4>
                    <p>Teaching faculty contributes to academic discipline, classroom learning and institutional quality.</p>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection