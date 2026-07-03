@extends('frontend.master')

@section('content')

<section class="faculty-hero-section">
    <div class="faculty-hero-shape faculty-hero-shape-1"></div>
    <div class="faculty-hero-shape faculty-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="faculty-hero-content text-center">

            <span class="faculty-kicker">
                <i class="bi bi-people-fill"></i>
                Academic Staff
            </span>

            <h1>Non-Teaching Staff</h1>

            <p>
                Official non-teaching staff list of Ram Krishna Dwarika College, Patna.
            </p>

            <nav class="faculty-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('frontend.departments') }}">Academics</a>
                <i class="bi bi-chevron-right"></i>
                <span>Non-Teaching Staff</span>
            </nav>

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
                        Official Staff List
                    </span>

                    <h2>Staff Name, Designation & Department</h2>
                </div>

                <a href="{{ route('frontend.faculty') }}" class="btn btn-outline-main">
                    Teaching Faculty
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="faculty-table-wrap">
                <table class="faculty-data-table">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>Staff Name</th>
                            <th>Designation</th>
                            <th>Department / Office</th>
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
                                    Non-teaching staff records will be updated soon.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>

@endsection