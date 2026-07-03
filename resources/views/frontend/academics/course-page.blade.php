@extends('frontend.master')

@section('content')

@php
    $prefix = $page->css_prefix ?? match($slug) {
        'ug' => 'ug',
        'pg' => 'pg',
        'vocational' => 'voc',
        default => 'ssc',
    };

    $heroIcons = [
        'ssc' => 'bi bi-journal-bookmark-fill',
        'ug'  => 'bi bi-mortarboard-fill',
        'pg'  => 'bi bi-mortarboard-fill',
        'voc' => 'bi bi-pc-display-horizontal',
    ];

    $summaryIcons = [
        'ssc' => 'bi bi-mortarboard-fill',
        'ug'  => 'bi bi-mortarboard-fill',
        'pg'  => 'bi bi-award-fill',
        'voc' => 'bi bi-pc-display-horizontal',
    ];

    $defaultTitles = [
        'senior-secondary' => 'Senior Secondary Courses',
        'ug' => 'Under Graduation Courses',
        'pg' => 'Post Graduate Courses',
        'vocational' => 'Vocational Courses',
    ];

    $defaultDescriptions = [
        'senior-secondary' => 'Senior Secondary course information of Ram Krishna Dwarika College, Patna, including course name, duration and eligibility details.',
        'ug' => 'Undergraduate course information of Ram Krishna Dwarika College, Patna, including course name, duration and eligibility details.',
        'pg' => 'Postgraduate course information of Ram Krishna Dwarika College, Patna, including course name, duration and eligibility details.',
        'vocational' => 'Vocational course information of Ram Krishna Dwarika College, Patna, including course name, duration and eligibility details.',
    ];

    $defaultStats = [
        'senior-secondary' => [
            ['value' => '3', 'label' => 'Streams'],
            ['value' => '2', 'label' => 'Years Duration'],
            ['value' => '10th', 'label' => 'Eligibility'],
        ],
        'ug' => [
            ['value' => '3', 'label' => 'Streams'],
            ['value' => '4', 'label' => 'Years Duration'],
            ['value' => '12th', 'label' => 'Eligibility'],
        ],
        'pg' => [
            ['value' => '5', 'label' => 'Departments'],
            ['value' => '2', 'label' => 'Years Duration'],
            ['value' => 'Graduation', 'label' => 'Eligibility'],
        ],
        'vocational' => [
            ['value' => '5', 'label' => 'Courses'],
            ['value' => '3', 'label' => 'Years Duration'],
            ['value' => '12th', 'label' => 'Eligibility'],
        ],
    ];

    $defaultCourses = [
        'senior-secondary' => [
            [
                'icon_class' => 'bi bi-book-half',
                'stream_label' => 'Arts Stream',
                'course_name' => 'I.A',
                'description' => 'Intermediate of Arts for students interested in humanities and social science subjects.',
                'duration' => '2 Years',
                'eligibility' => '10th Pass',
            ],
            [
                'icon_class' => 'bi bi-activity',
                'stream_label' => 'Science Stream',
                'course_name' => 'I.Sc',
                'description' => 'Intermediate of Science for students interested in science, mathematics and laboratory learning.',
                'duration' => '2 Years',
                'eligibility' => '10th Pass',
            ],
            [
                'icon_class' => 'bi bi-graph-up-arrow',
                'stream_label' => 'Commerce Stream',
                'course_name' => 'I.Com',
                'description' => 'Intermediate of Commerce for students interested in business, accounting and finance studies.',
                'duration' => '2 Years',
                'eligibility' => '10th Pass',
            ],
        ],
        'ug' => [
            [
                'icon_class' => 'bi bi-book-half',
                'stream_label' => 'Arts',
                'course_name' => 'B.A',
                'description' => 'Bachelor of Arts programme for humanities and social science subjects.',
                'duration' => '4 Years',
                'eligibility' => '12th Pass',
            ],
            [
                'icon_class' => 'bi bi-activity',
                'stream_label' => 'Science',
                'course_name' => 'B.Sc',
                'description' => 'Bachelor of Science programme for science subjects with theory and practical learning.',
                'duration' => '4 Years',
                'eligibility' => '12th Pass',
            ],
            [
                'icon_class' => 'bi bi-graph-up-arrow',
                'stream_label' => 'Commerce',
                'course_name' => 'B.Com',
                'description' => 'Bachelor of Commerce programme for accounting, finance and business studies.',
                'duration' => '4 Years',
                'eligibility' => '12th Pass',
            ],
        ],
        'pg' => [
            [
                'icon_class' => 'bi bi-book-half',
                'stream_label' => 'Arts / Social Science',
                'course_name' => 'M.A',
                'description' => 'Master of Arts programme for selected postgraduate subjects.',
                'duration' => '2 Years',
                'eligibility' => 'Graduation Pass',
            ],
            [
                'icon_class' => 'bi bi-graph-up-arrow',
                'stream_label' => 'Commerce',
                'course_name' => 'M.Com',
                'description' => 'Master of Commerce programme for commerce and finance studies.',
                'duration' => '2 Years',
                'eligibility' => 'Graduation Pass',
            ],
        ],
        'vocational' => [
            [
                'icon_class' => 'bi bi-pc-display',
                'stream_label' => 'Computer Application',
                'course_name' => 'B.C.A',
                'description' => 'Bachelor of Computer Applications programme for computer and IT learning.',
                'duration' => '3 Years',
                'eligibility' => '12th Pass',
            ],
            [
                'icon_class' => 'bi bi-briefcase-fill',
                'stream_label' => 'Business Management',
                'course_name' => 'B.B.M',
                'description' => 'Bachelor of Business Management programme for business and management studies.',
                'duration' => '3 Years',
                'eligibility' => '12th Pass',
            ],
            [
                'icon_class' => 'bi bi-diagram-3-fill',
                'stream_label' => 'Professional Course',
                'course_name' => 'A.S.P.M',
                'description' => 'Career-oriented vocational programme with professional academic exposure.',
                'duration' => '3 Years',
                'eligibility' => '12th Pass',
            ],
            [
                'icon_class' => 'bi bi-cpu-fill',
                'stream_label' => 'Information Technology',
                'course_name' => 'B.Sc. (IT)',
                'description' => 'Bachelor of Science in Information Technology programme.',
                'duration' => '3 Years',
                'eligibility' => '12th Pass',
            ],
            [
                'icon_class' => 'bi bi-airplane-fill',
                'stream_label' => 'Travel & Tourism',
                'course_name' => 'T.T.M',
                'description' => 'Travel and Tourism Management vocational programme.',
                'duration' => '3 Years',
                'eligibility' => '12th Pass',
            ],
        ],
    ];

    $defaultHelpCards = [
        [
            'icon_class' => 'bi bi-file-earmark-text-fill',
            'title' => 'Required Documents',
            'description' => 'Marksheet, transfer certificate, photo, ID proof and other admission documents as notified.',
        ],
        [
            'icon_class' => 'bi bi-megaphone-fill',
            'title' => 'Admission Notice',
            'description' => 'Students should check admission notices and college updates regularly before applying.',
        ],
        [
            'icon_class' => 'bi bi-telephone-fill',
            'title' => 'Admission Helpdesk',
            'description' => 'For admission or examination enquiry, contact the college office through official numbers.',
        ],
    ];

    $stats = ($page && !empty($page->summary_stats))
        ? $page->summary_stats
        : ($defaultStats[$slug] ?? $defaultStats['senior-secondary']);

    $courses = ($page && $page->courses && $page->courses->count())
        ? $page->courses
        : collect($defaultCourses[$slug] ?? $defaultCourses['senior-secondary']);

    $helpCards = ($page && $page->helpCards && $page->helpCards->count())
        ? $page->helpCards
        : collect($defaultHelpCards);

    $heroTitle = $page->hero_title ?? ($defaultTitles[$slug] ?? 'Academic Courses');
    $heroDescription = $page->hero_description ?? ($defaultDescriptions[$slug] ?? 'Academic course information of Ram Krishna Dwarika College, Patna.');
@endphp


{{-- HERO START --}}
<section class="{{ $prefix }}-hero-section">
    <div class="{{ $prefix }}-hero-shape {{ $prefix }}-hero-shape-1"></div>
    <div class="{{ $prefix }}-hero-shape {{ $prefix }}-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="{{ $prefix }}-hero-content text-center">

            <span class="{{ $prefix }}-kicker">
                <i class="{{ $heroIcons[$prefix] ?? 'bi bi-journal-bookmark-fill' }}"></i>
                {{ $page->kicker_text ?? 'Academics' }}
            </span>

            <h1>{{ $heroTitle }}</h1>

            <p>{{ $heroDescription }}</p>

            <nav class="{{ $prefix }}-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Academics</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $heroTitle }}</span>
            </nav>

        </div>
    </div>
</section>
{{-- HERO END --}}


{{-- COURSES START --}}
<section class="{{ $prefix }}-course-section">
    <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-1"></div>
    <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            {{-- LEFT SUMMARY --}}
            <div class="col-lg-4">
                <div class="{{ $prefix }}-summary-card h-100">

                    <div class="{{ $prefix }}-summary-icon">
                        <i class="{{ $summaryIcons[$prefix] ?? 'bi bi-mortarboard-fill' }}"></i>
                    </div>

                    <span>{{ $page->summary_label ?? 'Course Overview' }}</span>

                    <h2>{{ $page->summary_title ?? data_get($courses->first(), 'course_name', 'Course Overview') }}</h2>

                    <p>
                        {{ $page->summary_description ?? 'Explore academic course details including course name, duration and eligibility.' }}
                    </p>

                    <div class="{{ $prefix }}-summary-stats">
                        @foreach($stats as $stat)
                            <div>
                                <strong>{{ data_get($stat, 'value') }}</strong>
                                <small>{{ data_get($stat, 'label') }}</small>
                            </div>
                        @endforeach
                    </div>

                    <div class="{{ $prefix }}-info-note">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            <strong>{{ $page->note_title ?? 'Eligibility' }}</strong>
                            <span>{{ $page->note_description ?? 'Eligibility and subject selection will be as per college/university norms.' }}</span>
                        </div>
                    </div>

                </div>
            </div>

            {{-- RIGHT COURSES --}}
            <div class="col-lg-8">
                <div class="{{ $prefix }}-panel-card h-100">

                    <div class="{{ $prefix }}-panel-head">
                        <div>
                            <span class="{{ $prefix }}-subtitle">
                                <i class="bi bi-list-check"></i>
                                {{ $page->panel_label ?? 'Available Courses' }}
                            </span>

                            <h2>{{ $page->panel_title ?? 'Course Details' }}</h2>
                        </div>

                        <a href="{{ $page->button_url ?? 'admission.html' }}" class="btn btn-main">
                            {{ $page->button_text ?? 'Admission Details' }}
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="{{ $prefix }}-stream-grid">
                        @foreach($courses as $course)
                            <div class="{{ $prefix }}-stream-card">
                                <div class="{{ $prefix }}-stream-icon">
                                    <i class="{{ data_get($course, 'icon_class') ?: 'bi bi-book-half' }}"></i>
                                </div>

                                <span>{{ data_get($course, 'stream_label') }}</span>
                                <h4>{{ data_get($course, 'course_name') }}</h4>
                                <p>{{ data_get($course, 'description') }}</p>

                                <div class="{{ $prefix }}-meta">
                                    <div>
                                        <i class="bi bi-clock"></i>
                                        {{ data_get($course, 'duration') }}
                                    </div>

                                    <div>
                                        <i class="bi bi-person-check"></i>
                                        {{ data_get($course, 'eligibility') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
{{-- COURSES END --}}


{{-- COURSE TABLE START --}}
<section class="{{ $prefix }}-table-section">
    <div class="container">

        <div class="{{ $prefix }}-table-card">

            <div class="{{ $prefix }}-table-head">
                <div>
                    <span class="{{ $prefix }}-subtitle">
                        <i class="bi bi-table"></i>
                        {{ $page->table_label ?? 'Official Course Table' }}
                    </span>

                    <h2>{{ $page->table_title ?? 'Course Name, Duration & Eligibility' }}</h2>
                </div>

                <a href="{{ $page->download_button_url ?? 'downloads.html' }}" class="btn btn-outline-main">
                    {{ $page->download_button_text ?? 'Downloads' }}
                    <i class="bi bi-download"></i>
                </a>
            </div>

            <div class="{{ $prefix }}-table-wrap">
                <table class="{{ $prefix }}-course-table">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>Course Name</th>
                            <th>Duration</th>
                            <th>Eligibility</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($courses as $index => $course)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ data_get($course, 'course_name') }}</td>
                                <td>
                                    <span class="course-badge">
                                        {{ data_get($course, 'duration') }}
                                    </span>
                                </td>
                                <td>{{ data_get($course, 'eligibility') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center;">
                                    Course details will be updated soon.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>
{{-- COURSE TABLE END --}}


{{-- ADMISSION HELP START --}}
<section class="{{ $prefix }}-help-section">
    <div class="{{ $prefix }}-help-shape {{ $prefix }}-help-shape-1"></div>
    <div class="{{ $prefix }}-help-shape {{ $prefix }}-help-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4">

            @foreach($helpCards as $card)
                <div class="col-lg-4 col-md-6">
                    <div class="{{ $prefix }}-help-card">
                        <i class="{{ data_get($card, 'icon_class') ?: 'bi bi-info-circle-fill' }}"></i>
                        <h4>{{ data_get($card, 'title') }}</h4>
                        <p>{{ data_get($card, 'description') }}</p>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
{{-- ADMISSION HELP END --}}

@endsection