@extends('frontend.master')

@section('content')

@php
    $slug = $slug ?? optional($facility)->slug ?? 'conference-room';

    $fallbacks = [
        'conference-room' => [
            'prefix' => 'conf',

            'hero_icon' => 'bi bi-building-check',
            'hero_kicker' => 'Infrastructure',
            'hero_title' => 'Conference Room',
            'hero_description' => 'Conference Hall facility of Ram Krishna Dwarika College, Patna for academic meetings, seminars, institutional discussions and official programmes.',

            'image' => 'assets/img/Conference_02.jpeg',
            'image_alt' => 'RKD College Conference Room',
            'image_title' => 'Conference Hall',
            'image_description' => 'Official infrastructure page of RKD College includes Conference Room / Conference Hall as a campus facility.',

            'panel_title' => 'Academic & Institutional Meeting Space',
            'lead_description' => 'The Conference Room is an important academic infrastructure facility used for meetings, faculty interactions, academic discussions, seminars, workshops and official college-level programmes.',

            'button_text' => 'View Gallery',
            'button_url' => 'gallery.html',

            'features' => [
                [
                    'icon' => 'bi bi-people-fill',
                    'title' => 'Meetings',
                    'description' => 'Useful for official academic and administrative meetings.',
                ],
                [
                    'icon' => 'bi bi-mic-fill',
                    'title' => 'Seminars',
                    'description' => 'Supports guest talks, orientation and small academic sessions.',
                ],
                [
                    'icon' => 'bi bi-person-video3',
                    'title' => 'Faculty Interaction',
                    'description' => 'Designed for departmental and institutional interaction.',
                ],
                [
                    'icon' => 'bi bi-patch-check-fill',
                    'title' => 'Official Programmes',
                    'description' => 'Suitable for formal college programmes and activities.',
                ],
            ],

            'detail_label' => 'Facility Details',
            'detail_title' => 'Conference Room Uses',
            'detail_button_text' => 'Smart Room',
            'detail_button_url' => 'smart-room.html',
            'uses' => [
                [
                    'title' => 'Academic Meetings',
                    'description' => 'Used for academic planning, faculty discussion and department-level coordination.',
                ],
                [
                    'title' => 'Seminar Activities',
                    'description' => 'Suitable for small seminars, awareness programmes and expert interaction sessions.',
                ],
                [
                    'title' => 'Official Discussions',
                    'description' => 'Supports formal discussions, committee meetings and institutional planning.',
                ],
                [
                    'title' => 'Student-Oriented Programmes',
                    'description' => 'Can be used for orientation, counselling, skill development and academic guidance activities.',
                ],
            ],
        ],

        'smart-room' => [
            'prefix' => 'smart',

            'hero_icon' => 'bi bi-display-fill',
            'hero_kicker' => 'Infrastructure',
            'hero_title' => 'Smart Room',
            'hero_description' => 'ICT enabled smart classroom facility of Ram Krishna Dwarika College, Patna for digital learning, presentations and academic training sessions.',

            'image' => 'assets/img/library_02.jpeg',
            'image_alt' => 'RKD College Smart Room',
            'image_title' => 'ICT Enabled Classroom',
            'image_description' => 'Smart Room supports technology-based classroom delivery, digital learning resources and academic presentations.',

            'panel_title' => 'Digital Learning & Presentation Space',
            'lead_description' => 'The Smart Room is a modern learning facility created to support classroom teaching with digital tools, presentation-based learning, audio-visual interaction and academic training sessions.',

            'button_text' => 'ICT Training',
            'button_url' => 'ict-training-center.html',

            'features' => [
                [
                    'icon' => 'bi bi-display-fill',
                    'title' => 'Digital Presentation',
                    'description' => 'Supports presentation-based teaching and academic demonstrations.',
                ],
                [
                    'icon' => 'bi bi-camera-video-fill',
                    'title' => 'Audio Visual Support',
                    'description' => 'Useful for visual learning, academic talks and guided sessions.',
                ],
                [
                    'icon' => 'bi bi-laptop-fill',
                    'title' => 'ICT Learning',
                    'description' => 'Helps students understand concepts through digital classroom tools.',
                ],
                [
                    'icon' => 'bi bi-person-video3',
                    'title' => 'Interactive Sessions',
                    'description' => 'Suitable for seminars, workshops and teacher-student interaction.',
                ],
            ],

            'detail_label' => 'Facility Details',
            'detail_title' => 'Smart Room Uses',
            'detail_button_text' => 'Conference Room',
            'detail_button_url' => 'conference-room.html',
            'uses' => [
                [
                    'title' => 'Digital Classes',
                    'description' => 'Useful for technology-supported classroom teaching and subject demonstrations.',
                ],
                [
                    'title' => 'Presentations',
                    'description' => 'Supports PPT-based academic presentations and student learning activities.',
                ],
                [
                    'title' => 'ICT Training',
                    'description' => 'Helps conduct training sessions, workshops and digital learning activities.',
                ],
                [
                    'title' => 'Interactive Learning',
                    'description' => 'Supports audio-visual interaction between teachers and students.',
                ],
            ],
        ],

        'seminar-hall' => [
            'prefix' => 'seminar',

            'hero_icon' => 'bi bi-mic-fill',
            'hero_kicker' => 'Infrastructure',
            'hero_title' => 'Seminar Hall',
            'hero_description' => 'Seminar Hall facility of Ram Krishna Dwarika College, Patna for seminars, workshops, invited lectures and academic programmes.',

            'image' => 'assets/img/infrastructure/seminar-hall.jpg',
            'image_alt' => 'RKD College Seminar Hall',
            'image_title' => 'Academic Event Space',
            'image_description' => 'The Seminar Hall supports academic sessions, departmental programmes, orientation activities and institutional events.',

            'panel_title' => 'Seminars, Workshops & Guest Lectures',
            'lead_description' => 'The Seminar Hall is an important academic infrastructure facility used for seminars, workshops, invited lectures, student orientation, academic discussions and college-level programmes.',

            'button_text' => 'Conference Room',
            'button_url' => 'conference-room.html',

            'features' => [
                [
                    'icon' => 'bi bi-mic-fill',
                    'title' => 'Seminars',
                    'description' => 'Suitable for department-level and college-level academic seminars.',
                ],
                [
                    'icon' => 'bi bi-person-video3',
                    'title' => 'Guest Lectures',
                    'description' => 'Useful for invited talks, expert interaction and academic guidance.',
                ],
                [
                    'icon' => 'bi bi-tools',
                    'title' => 'Workshops',
                    'description' => 'Supports skill-based sessions, awareness programmes and training activities.',
                ],
                [
                    'icon' => 'bi bi-people-fill',
                    'title' => 'Student Activities',
                    'description' => 'Helps conduct orientation, presentations and student development events.',
                ],
            ],

            'detail_label' => 'Facility Details',
            'detail_title' => 'Seminar Hall Uses',
            'detail_button_text' => 'Conference Room',
            'detail_button_url' => 'conference-room.html',
            'uses' => [
                [
                    'title' => 'Academic Seminars',
                    'description' => 'Used for department-level and institution-level academic seminars.',
                ],
                [
                    'title' => 'Guest Lectures',
                    'description' => 'Suitable for expert talks, invited lectures and academic guidance sessions.',
                ],
                [
                    'title' => 'Workshops',
                    'description' => 'Supports skill-based workshops, training and awareness programmes.',
                ],
                [
                    'title' => 'Student Programmes',
                    'description' => 'Useful for orientation, presentation and student development events.',
                ],
            ],
        ],

        'canteen' => [
            'prefix' => 'canteen',

            'hero_icon' => 'bi bi-cup-hot-fill',
            'hero_kicker' => 'Infrastructure',
            'hero_title' => 'Canteen',
            'hero_description' => 'Canteen facility of Ram Krishna Dwarika College, Patna for refreshments and student-friendly campus support.',

            'image' => 'assets/img/canteeen.jpeg',
            'image_alt' => 'RKD College Canteen',
            'image_title' => 'Campus Refreshment Area',
            'image_description' => 'The canteen page is part of RKD College infrastructure section and can showcase food, refreshment and student-friendly campus support.',

            'panel_title' => 'Student-Friendly Canteen Facility',
            'lead_description' => 'The college canteen provides a convenient campus facility where students, teachers and staff can access refreshments during academic hours. This page is designed as a clean static frontend section and can be updated later with menu, timings, vendor details and notices from admin panel.',

            'button_text' => 'Student Zone',
            'button_url' => 'student-zone.html',

            'features' => [
                [
                    'icon' => 'bi bi-cup-hot-fill',
                    'title' => 'Refreshment Support',
                    'description' => 'Useful for snacks, tea, beverages and day-to-day campus refreshments.',
                ],
                [
                    'icon' => 'bi bi-people-fill',
                    'title' => 'Student Facility',
                    'description' => 'Supports students during class breaks, activities and campus movement.',
                ],
                [
                    'icon' => 'bi bi-shield-check',
                    'title' => 'Clean Environment',
                    'description' => 'Can highlight hygiene, safe service and responsible campus practices.',
                ],
                [
                    'icon' => 'bi bi-clock-fill',
                    'title' => 'Campus Hours',
                    'description' => 'Timing and service details can be updated as per college confirmation.',
                ],
            ],

            'detail_label' => 'Facility Details',
            'detail_title' => 'Canteen Facility Uses',
            'detail_button_text' => 'Student Zone',
            'detail_button_url' => 'student-zone.html',
            'uses' => [
                [
                    'title' => 'Refreshment Area',
                    'description' => 'Useful for snacks, tea, beverages and day-to-day campus refreshments.',
                ],
                [
                    'title' => 'Student Support',
                    'description' => 'Supports students during class breaks and college activities.',
                ],
                [
                    'title' => 'Clean Service',
                    'description' => 'Can highlight hygiene, safe service and responsible campus practices.',
                ],
                [
                    'title' => 'Campus Convenience',
                    'description' => 'Provides a convenient space for students, teachers and staff.',
                ],
            ],
        ],
    ];

    $data = $fallbacks[$slug] ?? $fallbacks['conference-room'];

    $prefix = optional($facility)->css_prefix ?: $data['prefix'];

    $heroIcon = $data['hero_icon'];
    $heroKicker = $data['hero_kicker'];
    $heroTitle = $data['hero_title'];
    $heroDescription = $data['hero_description'];

    $image = optional($facility)->facility_image_url ?: asset($data['image']);
    $imageAlt = optional($facility)->image_alt ?: $data['image_alt'];
    $imageTitle = optional($facility)->image_title ?: $data['image_title'];
    $imageDescription = optional($facility)->image_description ?: $data['image_description'];

    $panelTitle = optional($facility)->panel_title ?: $data['panel_title'];
    $leadDescription = optional($facility)->lead_description ?: $data['lead_description'];

    $features = optional($facility)->features ?: $data['features'];
    $uses = $data['uses'];

    $buttonText = $data['button_text'];
    $buttonUrl = $data['button_url'];

    $detailLabel = $data['detail_label'];
    $detailTitle = $data['detail_title'];
    $detailButtonText = $data['detail_button_text'];
    $detailButtonUrl = $data['detail_button_url'];

    $quickLinks = [
        'smart-room' => [
            'title' => 'Smart Room',
            'icon' => 'bi bi-display-fill',
            'url' => '/smart-room',
        ],
        'library' => [
            'title' => 'Library',
            'icon' => 'bi bi-book-half',
            'url' => '/library',
        ],
        'computer-room' => [
            'title' => 'Computer Room',
            'icon' => 'bi bi-pc-display-horizontal',
            'url' => '/computer-room',
        ],
        'girls-common-room' => [
            'title' => 'Girls Common Room',
            'icon' => 'bi bi-people-fill',
            'url' => '/girls-common-room',
        ],
        'canteen' => [
            'title' => 'Canteen',
            'icon' => 'bi bi-cup-hot-fill',
            'url' => '/canteen',
        ],
        'health-centre' => [
            'title' => 'Health Centre',
            'icon' => 'bi bi-heart-pulse-fill',
            'url' => '/health-centre',
        ],
        'gym' => [
            'title' => 'Gym',
            'icon' => 'bi bi-trophy-fill',
            'url' => '/gym',
        ],
        'seminar-hall' => [
            'title' => 'Seminar Hall',
            'icon' => 'bi bi-mic-fill',
            'url' => '/seminar-hall',
        ],
        'conference-room' => [
            'title' => 'Conference Room',
            'icon' => 'bi bi-building-check',
            'url' => '/conference-room',
        ],
    ];
@endphp


{{-- FACILITY HERO START --}}
<section class="{{ $prefix }}-hero-section">
    <div class="{{ $prefix }}-hero-shape {{ $prefix }}-hero-shape-1"></div>
    <div class="{{ $prefix }}-hero-shape {{ $prefix }}-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="{{ $prefix }}-hero-content text-center">

            <span class="{{ $prefix }}-kicker">
                <i class="{{ $heroIcon }}"></i>
                {{ $heroKicker }}
            </span>

            <h1>{{ $heroTitle }}</h1>

            <p>{{ $heroDescription }}</p>

            <nav class="{{ $prefix }}-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Infrastructure</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $heroTitle }}</span>
            </nav>

        </div>
    </div>
</section>
{{-- FACILITY HERO END --}}


{{-- FACILITY MAIN START --}}
<section class="{{ $prefix }}-main-section">
    <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-1"></div>
    <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            {{-- LEFT IMAGE --}}
            <div class="col-lg-5">
                <div class="{{ $prefix }}-image-card h-100">

                    <div class="{{ $prefix }}-main-image">
                        <img src="{{ $image }}" alt="{{ $imageAlt }}">
                    </div>

                    <div class="{{ $prefix }}-image-info">
                        <span>
                            <i class="bi bi-images"></i>
                            Infrastructure Facility
                        </span>

                        <h2>{{ $imageTitle }}</h2>

                        <p>{{ $imageDescription }}</p>
                    </div>

                </div>
            </div>

            {{-- RIGHT CONTENT --}}
            <div class="col-lg-7">
                <div class="{{ $prefix }}-panel-card h-100">

                    <div class="{{ $prefix }}-panel-head">
                        <div>
                            <span class="{{ $prefix }}-subtitle">
                                <i class="bi bi-info-circle-fill"></i>
                                Facility Overview
                            </span>

                            <h2>{{ $panelTitle }}</h2>
                        </div>

                        <a href="{{ $buttonUrl }}" class="btn btn-outline-main">
                            {{ $buttonText }}
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <p class="{{ $prefix }}-lead">
                        {{ $leadDescription }}
                    </p>

                    <div class="{{ $prefix }}-feature-grid">

                        @foreach($features as $feature)
                            <div class="{{ $prefix }}-feature-card">
                                <i class="{{ data_get($feature, 'icon', 'bi bi-patch-check-fill') }}"></i>

                                <h4>{{ data_get($feature, 'title') }}</h4>

                                <p>{{ data_get($feature, 'description') }}</p>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
{{-- FACILITY MAIN END --}}


{{-- FACILITY DETAILS START --}}
<section class="{{ $prefix }}-detail-section">
    <div class="container">

        <div class="{{ $prefix }}-detail-card">

            <div class="{{ $prefix }}-detail-head">
                <div>
                    <span class="{{ $prefix }}-subtitle">
                        <i class="bi bi-list-check"></i>
                        {{ $detailLabel }}
                    </span>

                    <h2>{{ $detailTitle }}</h2>
                </div>

                <a href="{{ $detailButtonUrl }}" class="btn btn-outline-main">
                    {{ $detailButtonText }}
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="{{ $prefix }}-use-grid">

                @foreach($uses as $index => $use)
                    <div class="{{ $prefix }}-use-card">
                        <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h4>{{ $use['title'] }}</h4>
                        <p>{{ $use['description'] }}</p>
                    </div>
                @endforeach

            </div>

        </div>

    </div>
</section>
{{-- FACILITY DETAILS END --}}


{{-- INFRASTRUCTURE QUICK LINKS START --}}
<section class="{{ $prefix }}-link-section">
    <div class="container">

        <div class="{{ $prefix }}-link-card">

            <div class="{{ $prefix }}-link-head">
                <div>
                    <span class="{{ $prefix }}-subtitle">
                        <i class="bi bi-grid-fill"></i>
                        Infrastructure
                    </span>

                    <h2>Other Infrastructure Facilities</h2>
                </div>
            </div>

            <div class="{{ $prefix }}-link-grid">

                @foreach($quickLinks as $linkSlug => $link)
                    @continue($linkSlug === $slug)

                    <a href="{{ url($link['url']) }}">
                        <i class="{{ $link['icon'] }}"></i>
                        {{ $link['title'] }}
                    </a>
                @endforeach

            </div>

        </div>

    </div>
</section>
{{-- INFRASTRUCTURE QUICK LINKS END --}}

@endsection