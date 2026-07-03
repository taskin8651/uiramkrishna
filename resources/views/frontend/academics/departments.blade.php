@extends('frontend.master')

@section('content')

@php
    $totalDepartments = $streams->sum(fn($stream) => $stream->departments->count());
    $ugCount = $streams->filter(fn($stream) => str_contains(strtolower($stream->type_label ?? ''), 'ug'))->count();
    $pgCount = $streams->filter(fn($stream) => str_contains(strtolower($stream->type_label ?? ''), 'pg'))->count();
    $vocationalCount = $streams->filter(fn($stream) => str_contains(strtolower($stream->type_label ?? ''), 'vocational'))->count();
@endphp

{{-- DEPARTMENTS HERO START --}}
<section class="dept-hero-section">
    <div class="dept-hero-shape dept-hero-shape-1"></div>
    <div class="dept-hero-shape dept-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="dept-hero-content text-center">

            <span class="dept-kicker">
                <i class="bi bi-columns-gap"></i>
                Academics
            </span>

            <h1>Departments</h1>

            <p>
                Academic departments of Ram Krishna Dwarika College, Patna across
                Humanities, Social Science, Science, Commerce and Vocational streams.
            </p>

            <nav class="dept-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Academics</a>
                <i class="bi bi-chevron-right"></i>
                <span>Departments</span>
            </nav>

        </div>
    </div>
</section>
{{-- DEPARTMENTS HERO END --}}


{{-- DEPARTMENTS OVERVIEW START --}}
<section class="dept-overview-section">
    <div class="dept-bg-shape dept-bg-shape-1"></div>
    <div class="dept-bg-shape dept-bg-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            {{-- LEFT SUMMARY --}}
            <div class="col-lg-4">
                <div class="dept-summary-card h-100">

                    <div class="dept-summary-icon">
                        <i class="bi bi-bank2"></i>
                    </div>

                    <span>Department Overview</span>

                    <h2>Academic Faculties</h2>

                    <p>
                        RKD College has distinguished faculty members in Humanities, Social
                        Science, Science and Commerce, supporting quality academic outcomes.
                    </p>

                    <div class="dept-summary-stats">
                        <div>
                            <strong>{{ $totalDepartments }}</strong>
                            <small>Departments</small>
                        </div>

                        <div>
                            <strong>{{ $streams->count() }}</strong>
                            <small>Streams</small>
                        </div>

                        <div>
                            <strong>{{ $vocationalCount ?: 1 }}</strong>
                            <small>Vocational</small>
                        </div>
                    </div>

                    <div class="dept-info-note">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            <strong>Academic Structure</strong>
                            <span>Departments are grouped under Humanities, Social Science, Science, Commerce and Vocational streams.</span>
                        </div>
                    </div>

                </div>
            </div>

            {{-- RIGHT FACULTIES --}}
            <div class="col-lg-8">
                <div class="dept-panel-card h-100">

                    <div class="dept-panel-head">
                        <div>
                            <span class="dept-subtitle">
                                <i class="bi bi-diagram-3-fill"></i>
                                Faculty Wise Structure
                            </span>

                            <h2>Departments by Academic Stream</h2>
                        </div>

                        <a href="{{ route('frontend.staff') }}" class="btn btn-main">
                            Faculty Details
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="dept-faculty-grid">
                        @forelse($streams as $stream)
                            <div class="dept-faculty-card">
                                <div class="dept-faculty-icon">
                                    <i class="{{ $stream->icon_class ?: 'bi bi-columns-gap' }}"></i>
                                </div>

                                <span>{{ $stream->faculty_label ?? 'Faculty' }}</span>
                                <h4>{{ $stream->name }}</h4>
                                <p>{{ $stream->description }}</p>
                            </div>
                        @empty
                            <div class="dept-faculty-card">
                                <div class="dept-faculty-icon">
                                    <i class="bi bi-info-circle-fill"></i>
                                </div>

                                <span>Departments</span>
                                <h4>Will be updated soon</h4>
                                <p>Academic department details will be published soon.</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
{{-- DEPARTMENTS OVERVIEW END --}}


{{-- DEPARTMENT LIST START --}}
<section class="dept-list-section">
    <div class="container">

        <div class="section-title text-center dept-list-title">
            <span>
                <i class="bi bi-list-check"></i>
                Department List
            </span>

            <h2>Academic Departments</h2>

            <p>
                Original department structure organized stream-wise for easy student access.
            </p>
        </div>

        <div class="dept-list-grid">

            @forelse($streams as $stream)
                <div class="dept-list-card {{ strtolower($stream->name) === 'vocational' ? 'dept-voc-card' : '' }}">
                    <div class="dept-list-head">
                        <div class="dept-list-icon">
                            <i class="{{ $stream->icon_class ?: 'bi bi-columns-gap' }}"></i>
                        </div>

                        <div>
                            <span>{{ $stream->name }}</span>
                            <h4>{{ strtolower($stream->name) === 'vocational' ? 'Courses / Departments' : 'Departments' }}</h4>
                        </div>
                    </div>

                    <div class="dept-chip-list">
                        @forelse($stream->departments as $department)
                            <a href="{{ $department->link_url ?: '#' }}">
                                {{ $department->name }}
                            </a>
                        @empty
                            <a href="#">Will be updated soon</a>
                        @endforelse
                    </div>
                </div>
            @empty
                <div class="dept-list-card">
                    <div class="dept-list-head">
                        <div class="dept-list-icon">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>

                        <div>
                            <span>Departments</span>
                            <h4>Will be updated soon</h4>
                        </div>
                    </div>

                    <div class="dept-chip-list">
                        <a href="#">No department found</a>
                    </div>
                </div>
            @endforelse

        </div>

    </div>
</section>
{{-- DEPARTMENT LIST END --}}


{{-- DEPARTMENT TABLE START --}}
<section class="dept-table-section">
    <div class="dept-table-shape dept-table-shape-1"></div>
    <div class="dept-table-shape dept-table-shape-2"></div>

    <div class="container position-relative">

        <div class="dept-table-card">

            <div class="dept-table-head">
                <div>
                    <span class="dept-subtitle">
                        <i class="bi bi-table"></i>
                        Department Summary
                    </span>

                    <h2>Stream Wise Department Details</h2>
                </div>

                <a href="{{ route('frontend.senior-secondary-courses') }}" class="btn btn-outline-main">
                    View Courses
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="dept-table-wrap">
                <table class="dept-course-table">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>Stream / Faculty</th>
                            <th>Departments / Subjects</th>
                            <th>Type</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($streams as $index => $stream)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $stream->name }}</td>
                                <td>{{ $stream->departments->pluck('name')->implode(', ') ?: 'Will be updated soon' }}</td>
                                <td>
                                    <span class="dept-badge">
                                        {{ $stream->type_label ?? 'UG' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center;">
                                    Department details will be updated soon.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>
{{-- DEPARTMENT TABLE END --}}


{{-- DEPARTMENT SUPPORT START --}}
<section class="dept-support-section">
    <div class="container">

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="dept-support-card">
                    <i class="bi bi-person-video3"></i>
                    <h4>Faculty Profiles</h4>
                    <p>Future-ready structure for faculty profile pages and department-wise teacher details.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="dept-support-card">
                    <i class="bi bi-journal-check"></i>
                    <h4>Course Guidance</h4>
                    <p>Students can explore department-wise subjects, courses and academic options.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="dept-support-card">
                    <i class="bi bi-building-check"></i>
                    <h4>Academic Support</h4>
                    <p>Departments support classroom learning, practical activities and academic development.</p>
                </div>
            </div>

        </div>

    </div>
</section>
{{-- DEPARTMENT SUPPORT END --}}

@endsection