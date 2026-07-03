@extends('frontend.master')

@section('content')

@php
    $slug = $slug ?? optional($facility)->slug ?? 'computer-room';

    $fallbacks = [
        'computer-room' => [
            'prefix' => 'comp',

            'hero_icon' => 'bi bi-pc-display-horizontal',
            'hero_kicker' => 'Learning Facility',
            'hero_title' => 'Computer Room',
            'hero_description' => 'Computer Room facility of Ram Krishna Dwarika College, Patna for ICT learning, practical exposure, internet-based academic access and digital student support.',

            'image' => 'assets/img/elibrary_1.jpeg',
            'image_badge' => 'Digital Infrastructure',
            'image_alt' => 'RKD College Computer Room',
            'image_title' => 'Computer Lab Support',
            'image_description' => 'Computer Room supports ICT learning, practical exposure, internet-based academic access and digital student support.',

            'panel_subtitle' => 'Facility Overview',
            'panel_title' => 'Digital Learning & Internet Facility',
            'lead_description' => 'The Computer Room is an important digital infrastructure facility of the college. It supports computer-based learning, practical sessions, online academic resources, e-content access and student digital skill development.',

            'button_text' => 'ICT Training',
            'button_url' => 'ict-training-center.html',
            'button_external' => false,

            'features' => [
                ['icon' => 'bi bi-pc-display-horizontal', 'title' => 'Computer Access', 'description' => 'Supports students with computer-based academic and practical work.'],
                ['icon' => 'bi bi-wifi', 'title' => 'Internet Facility', 'description' => 'Useful for accessing e-books, e-journals and digital study materials.'],
                ['icon' => 'bi bi-file-earmark-text-fill', 'title' => 'E-Content Support', 'description' => 'Helps students access online contents and course-related resources.'],
                ['icon' => 'bi bi-mortarboard-fill', 'title' => 'Digital Skill Learning', 'description' => 'Supports computer literacy, ICT learning and academic preparation.'],
            ],

            'gallery_label' => 'Computer Room Gallery',
            'gallery_title' => 'Digital Learning Images',
            'gallery_description' => 'Use local optimized images here. Replace these paths with actual computer room images when available from college.',

            'gallery_items' => [
                ['image_url' => 'assets/img/elibrary_1.jpeg', 'image_alt' => 'Computer Room Image 1', 'title' => 'Computer Room', 'size_class' => 'large'],
                ['image_url' => 'assets/img/elibrary_2.jpeg', 'image_alt' => 'Computer Room Image 2', 'title' => 'Digital Lab', 'size_class' => ''],
                ['image_url' => 'assets/img/lib_16.jpeg', 'image_alt' => 'Computer Room Image 3', 'title' => 'ICT Learning', 'size_class' => ''],
                ['image_url' => 'assets/img/lib_24.jpeg', 'image_alt' => 'Computer Room Image 4', 'title' => 'Online Resources', 'size_class' => ''],
                ['image_url' => 'assets/img/infrastructure/computer-room-5.jpg', 'image_alt' => 'Computer Room Image 5', 'title' => 'Practical Work', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_01.jpeg', 'image_alt' => 'Digital Resource Image', 'title' => 'Digital Resource Support', 'size_class' => 'wide'],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_02.jpeg', 'image_alt' => 'Library Resource Image', 'title' => 'Learning Resource', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_03.jpeg', 'image_alt' => 'Study Material Image', 'title' => 'Study Material', 'size_class' => ''],
            ],
        ],

        'e-library' => [
            'prefix' => 'elib',

            'hero_icon' => 'bi bi-journal-bookmark-fill',
            'hero_kicker' => 'Learning Facility',
            'hero_title' => 'E-Library',
            'hero_description' => 'E-Library facility of Ram Krishna Dwarika College, Patna for online resources, e-books, study materials and academic references.',

            'image' => 'https://rkdcollegepatna.org/Facilities/library_01.jpeg',
            'image_badge' => 'Digital Learning Facility',
            'image_alt' => 'RKD College E Library',
            'image_title' => 'Online Library Support',
            'image_description' => 'E-Library supports digital academic access through online resources, e-books, study materials and learning references.',

            'panel_subtitle' => 'Facility Overview',
            'panel_title' => 'Digital Resources & E-Books Access',
            'lead_description' => 'The E-Library page is part of the college infrastructure section and supports online academic learning. Students can use digital resources, e-books, study material, teaching schedules and academic references for better preparation.',

            'button_text' => 'Official Page',
            'button_url' => 'https://rkdcollegepatna.org/ELibrary.aspx',
            'button_external' => true,

            'features' => [
                ['icon' => 'bi bi-book-fill', 'title' => 'E-Books Access', 'description' => 'Digital books and online academic references support student learning.'],
                ['icon' => 'bi bi-file-earmark-text-fill', 'title' => 'Study Materials', 'description' => 'Helpful for assignments, examination preparation and course reference.'],
                ['icon' => 'bi bi-wifi', 'title' => 'Internet Facility', 'description' => 'Online access helps students explore digital academic resources.'],
                ['icon' => 'bi bi-laptop-fill', 'title' => 'Digital Learning', 'description' => 'Supports e-learning resources and modern academic preparation.'],
            ],

            'gallery_label' => 'Library Gallery',
            'gallery_title' => 'E-Library & Library Images',
            'gallery_description' => 'Official library images are used here to present the learning environment. These can be optimized later into local assets.',

            'gallery_items' => [
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_01.jpeg', 'image_alt' => 'E Library Image 1', 'title' => 'Digital Learning Area', 'size_class' => 'large'],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_02.jpeg', 'image_alt' => 'E Library Image 2', 'title' => 'Library Collection', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_03.jpeg', 'image_alt' => 'E Library Image 3', 'title' => 'Study Resource Area', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_10.jpeg', 'image_alt' => 'E Library Image 4', 'title' => 'Library View', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_11.jpeg', 'image_alt' => 'E Library Image 5', 'title' => 'Reading Facility', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_12.jpeg', 'image_alt' => 'E Library Image 6', 'title' => 'Book Rack & Resources', 'size_class' => 'wide'],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_13.jpeg', 'image_alt' => 'E Library Image 7', 'title' => 'Library Facility', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_14.jpeg', 'image_alt' => 'E Library Image 8', 'title' => 'Academic Resources', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_15.jpeg', 'image_alt' => 'E Library Image 9', 'title' => 'Study Space', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_16.jpeg', 'image_alt' => 'E Library Image 10', 'title' => 'Library Room', 'size_class' => ''],
            ],
        ],

        'library' => [
            'prefix' => 'library',

            'hero_icon' => 'bi bi-book-half',
            'hero_kicker' => 'Learning Facility',
            'hero_title' => 'Library',
            'hero_description' => 'Library facility of Ram Krishna Dwarika College, Patna for academic reading, reference support and book catalogue access.',

            'image' => 'https://rkdcollegepatna.org/Facilities/lib_10.jpeg',
            'image_badge' => 'Official Library Facility',
            'image_alt' => 'RKD College Library',
            'image_title' => 'College Library',
            'image_description' => 'Official library page includes book catalogue download and multiple library facility images for student reference.',

            'panel_subtitle' => 'Facility Overview',
            'panel_title' => 'Academic Reading & Resource Centre',
            'lead_description' => 'The Library is an important academic facility of the college. It supports students, teachers and researchers with books, reading space, reference resources and academic learning support. The official page also provides a downloadable list of books available in the library.',

            'button_text' => 'Book Catalogue',
            'button_url' => 'https://rkdcollegepatna.org/Downloads/merged_books_with_rack_and_language.xlsx',
            'button_external' => true,

            'features' => [
                ['icon' => 'bi bi-book-fill', 'title' => 'Book Resources', 'description' => 'Book catalogue and library resources support student academic preparation.'],
                ['icon' => 'bi bi-journal-bookmark-fill', 'title' => 'Reference Support', 'description' => 'Helpful for subject reference, reading and regular study work.'],
                ['icon' => 'bi bi-people-fill', 'title' => 'Student Learning', 'description' => 'Supports UG, PG and vocational students in academic learning.'],
                ['icon' => 'bi bi-file-earmark-spreadsheet-fill', 'title' => 'Book Catalogue', 'description' => 'Official Excel file is available for list of books in library.'],
            ],

            'gallery_label' => 'Library Gallery',
            'gallery_title' => 'Library Images',
            'gallery_description' => 'Official library page contains multiple library facility images. These images can be replaced later with local optimized assets.',

            'gallery_items' => [
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_10.jpeg', 'image_alt' => 'Library Image 1', 'title' => 'Library View', 'size_class' => 'large'],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_11.jpeg', 'image_alt' => 'Library Image 2', 'title' => 'Reading Area', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_12.jpeg', 'image_alt' => 'Library Image 3', 'title' => 'Book Section', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_13.jpeg', 'image_alt' => 'Library Image 4', 'title' => 'Library Facility', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_14.jpeg', 'image_alt' => 'Library Image 5', 'title' => 'Book Rack', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_15.jpeg', 'image_alt' => 'Library Image 6', 'title' => 'Study Space', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_16.jpeg', 'image_alt' => 'Library Image 7', 'title' => 'Library Room', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_01.jpeg', 'image_alt' => 'Library Image 8', 'title' => 'Library Collection', 'size_class' => 'wide'],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_02.jpeg', 'image_alt' => 'Library Image 9', 'title' => 'Resource Area', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_03.jpeg', 'image_alt' => 'Library Image 10', 'title' => 'Library Interior', 'size_class' => ''],
            ],
        ],

        'ict-training-center' => [
            'prefix' => 'ict',

            'hero_icon' => 'bi bi-router-fill',
            'hero_kicker' => 'Learning Facility',
            'hero_title' => 'ICT Training Center',
            'hero_description' => 'ICT Training Center facility of Ram Krishna Dwarika College, Patna for digital learning, computer-based practice and technology-enabled academic preparation.',

            'image' => 'https://rkdcollegepatna.org/Facilities/library_02.jpeg',
            'image_badge' => 'Digital Training Facility',
            'image_alt' => 'RKD College ICT Training Center',
            'image_title' => 'ICT Learning Support',
            'image_description' => 'The ICT Training Center supports technology-based learning, digital skill development and academic use of online resources.',

            'panel_subtitle' => 'Facility Overview',
            'panel_title' => 'Technology Enabled Training Space',
            'lead_description' => 'The ICT Training Center is designed to support students with digital learning, computer-based practice, online academic resources, e-content, e-books, e-journals and technology-enabled academic preparation.',

            'button_text' => 'Computer Room',
            'button_url' => 'computer-room.html',
            'button_external' => false,

            'features' => [
                ['icon' => 'bi bi-pc-display-horizontal', 'title' => 'Computer Training', 'description' => 'Supports computer-based academic learning and practical digital work.'],
                ['icon' => 'bi bi-wifi', 'title' => 'Internet Facility', 'description' => 'Helps students access online resources, e-books and e-journals.'],
                ['icon' => 'bi bi-file-earmark-text-fill', 'title' => 'E-Study Material', 'description' => 'Useful for digital notes, course material and online content access.'],
                ['icon' => 'bi bi-person-video3', 'title' => 'ICT Sessions', 'description' => 'Can support training sessions, workshops and digital literacy activities.'],
            ],

            'gallery_label' => 'ICT Gallery',
            'gallery_title' => 'Digital Learning Images',
            'gallery_description' => 'Local ICT images can be replaced later with official optimized images from college. Library / digital resource images are also used as reference visuals.',

            'gallery_items' => [
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_02.jpeg', 'image_alt' => 'Study Resource', 'title' => 'Study Material Support', 'size_class' => 'wide'],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/library_03.jpeg', 'image_alt' => 'Academic Resource', 'title' => 'Digital Academic Resource', 'size_class' => ''],
                ['image_url' => 'https://rkdcollegepatna.org/Facilities/lib_10.jpeg', 'image_alt' => 'Library Support Image', 'title' => 'E-Resource Support', 'size_class' => ''],
            ],
        ],
    ];

    $data = $fallbacks[$slug] ?? $fallbacks['computer-room'];

    $prefix = optional($facility)->css_prefix ?: $data['prefix'];

    $heroIcon = optional($facility)->hero_icon ?: $data['hero_icon'];
    $heroKicker = optional($facility)->hero_kicker ?: $data['hero_kicker'];
    $heroTitle = optional($facility)->hero_title ?: $data['hero_title'];
    $heroDescription = optional($facility)->hero_description ?: $data['hero_description'];

    $mainImage = optional($facility)->main_image_url ?: $data['image'];
    $mainImage = str_starts_with($mainImage, 'http') ? $mainImage : asset($mainImage);

    $imageBadge = optional($facility)->image_badge ?: $data['image_badge'];
    $imageAlt = optional($facility)->image_alt ?: $data['image_alt'];
    $imageTitle = optional($facility)->image_title ?: $data['image_title'];
    $imageDescription = optional($facility)->image_description ?: $data['image_description'];

    $panelSubtitle = optional($facility)->panel_subtitle ?: $data['panel_subtitle'];
    $panelTitle = optional($facility)->panel_title ?: $data['panel_title'];
    $leadDescription = optional($facility)->lead_description ?: $data['lead_description'];

    $buttonText = optional($facility)->button_text ?: $data['button_text'];
    $buttonUrl = optional($facility)->button_url ?: $data['button_url'];
    $buttonExternal = optional($facility)->button_external ?? $data['button_external'];

    $features = optional($facility)->features ?: $data['features'];

    $galleryLabel = optional($facility)->gallery_label ?: $data['gallery_label'];
    $galleryTitle = optional($facility)->gallery_title ?: $data['gallery_title'];
    $galleryDescription = optional($facility)->gallery_description ?: $data['gallery_description'];
    $galleryItems = optional($facility)->gallery_items ?: $data['gallery_items'];

    $buttonHref = str_starts_with($buttonUrl, 'http') ? $buttonUrl : url($buttonUrl);
@endphp


{{-- LEARNING HERO START --}}
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
                <a href="#">Learning Facilities</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $heroTitle }}</span>
            </nav>

        </div>
    </div>
</section>
{{-- LEARNING HERO END --}}


{{-- LEARNING MAIN START --}}
<section class="{{ $prefix }}-main-section">
    <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-1"></div>
    <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-5">
                <div class="{{ $prefix }}-image-card h-100">

                    <div class="{{ $prefix }}-main-image">
                        <img src="{{ $mainImage }}" alt="{{ $imageAlt }}">
                    </div>

                    <div class="{{ $prefix }}-image-info">
                        <span>
                            <i class="bi bi-images"></i>
                            {{ $imageBadge }}
                        </span>

                        <h2>{{ $imageTitle }}</h2>

                        <p>{{ $imageDescription }}</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-7">
                <div class="{{ $prefix }}-panel-card h-100">

                    <div class="{{ $prefix }}-panel-head">
                        <div>
                            <span class="{{ $prefix }}-subtitle">
                                <i class="bi bi-info-circle-fill"></i>
                                {{ $panelSubtitle }}
                            </span>

                            <h2>{{ $panelTitle }}</h2>
                        </div>

                        <a href="{{ $buttonHref }}"
                           class="btn btn-outline-main"
                           @if($buttonExternal) target="_blank" @endif>
                            {{ $buttonText }}

                            @if($buttonExternal)
                                <i class="bi bi-box-arrow-up-right"></i>
                            @else
                                <i class="bi bi-arrow-right"></i>
                            @endif
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
{{-- LEARNING MAIN END --}}


{{-- LEARNING GALLERY START --}}
@if(count($galleryItems))
    <section class="{{ $prefix }}-gallery-section">
        <div class="container">

            <div class="{{ $prefix }}-gallery-head text-center">
                <span class="{{ $prefix }}-subtitle">
                    <i class="bi bi-images"></i>
                    {{ $galleryLabel }}
                </span>

                <h2>{{ $galleryTitle }}</h2>

                <p>{{ $galleryDescription }}</p>
            </div>

            <div class="{{ $prefix }}-gallery-grid">

                @foreach($galleryItems as $item)
                    @php
                        $galleryImage = data_get($item, 'image_url');

                        if ($galleryImage && !str_starts_with($galleryImage, 'http')) {
                            $galleryImage = asset($galleryImage);
                        }

                        $sizeClass = data_get($item, 'size_class');
                    @endphp

                    @if($galleryImage)
                        <a href="{{ $galleryImage }}"
                           target="_blank"
                           class="{{ $prefix }}-gallery-card {{ $sizeClass }}">
                            <img src="{{ $galleryImage }}" alt="{{ data_get($item, 'image_alt') }}">
                            <span>{{ data_get($item, 'title') }}</span>
                        </a>
                    @endif
                @endforeach

            </div>

        </div>
    </section>
@endif
{{-- LEARNING GALLERY END --}}

@endsection