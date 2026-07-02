@extends('frontend.master')
@section('content')


<!-- ABOUT PAGE HERO START -->
  <section class="inner-hero about-inner-hero">
    <div class="inner-hero-shape inner-hero-shape-1"></div>
    <div class="inner-hero-shape inner-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="inner-hero-content text-center">

        <span class="inner-kicker">
          <i class="bi bi-building-check"></i>
          About College
        </span>

        <h1>Ram Krishna Dwarika College, Patna</h1>

        <p>
          A constituent unit of Patliputra University, Patna, committed to quality education,
          student support, academic discipline and institutional development.
        </p>

        <nav class="inner-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <span>About College</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- ABOUT PAGE HERO END -->


  @php
    $aboutImage = ($about && $about->about_image_url)
        ? $about->about_image_url
        : asset('assets/img/slide112.jpg');

    $points = ($about && !empty($about->points)) ? $about->points : [
        'Established in 1975',
        'PPU Constituent Unit',
        'Humanities, Science & Commerce',
        'UG, PG & Vocational Courses',
    ];

    $stats = ($about && !empty($about->stats)) ? $about->stats : [
        ['value' => '1975', 'label' => 'Established'],
        ['value' => '20+', 'label' => 'UG Departments'],
        ['value' => '5', 'label' => 'PG Departments'],
        ['value' => '7000+', 'label' => 'Students'],
    ];

    $historyItems = ($about && !empty($about->history_items)) ? $about->history_items : [
        ['year' => '1975', 'text' => 'College established with a vision for higher education.'],
        ['year' => '1986', 'text' => 'Became constituent unit of Magadh University, Bodh Gaya.'],
        ['year' => 'Present', 'text' => 'Constituent unit of Patliputra University, Patna.'],
    ];

    $historyIcons = [
        'bi bi-calendar-check',
        'bi bi-bank',
        'bi bi-mortarboard',
    ];

    $profileTags = ($about && !empty($about->profile_tags)) ? $about->profile_tags : [
        'Humanities',
        'Science',
        'Commerce',
        'Vocational',
        'NCC / NSS',
        'Sports & Culture',
    ];

    $profileIcons = [
        'bi bi-book-half',
        'bi bi-activity',
        'bi bi-graph-up-arrow',
        'bi bi-pc-display',
        'bi bi-flag-fill',
        'bi bi-trophy-fill',
    ];

    $missions = ($about && !empty($about->missions)) ? $about->missions : [
        ['title' => 'Innovative Pedagogy', 'description' => 'Inclusion of innovative and technology-based teaching methods.'],
        ['title' => 'Experiential Learning', 'description' => 'Focus on activity-based learning and practical academic exposure.'],
        ['title' => 'Entrepreneurship Skills', 'description' => 'Building entrepreneurship skills among students and faculty.'],
        ['title' => 'Research Culture', 'description' => 'Development of research facilities and academic research culture.'],
        ['title' => 'Holistic Development', 'description' => 'Encouraging all-round development of students.'],
        ['title' => 'Mentorship & Networking', 'description' => 'Mentorship, competitive exam support and academic networking.'],
    ];

    $missionIcons = [
        'bi bi-lightbulb-fill',
        'bi bi-person-workspace',
        'bi bi-briefcase-fill',
        'bi bi-search-heart-fill',
        'bi bi-stars',
        'bi bi-diagram-3-fill',
    ];
@endphp

<section class="about-page-section">
    <div class="about-page-shape about-page-shape-1"></div>
    <div class="about-page-shape about-page-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            {{-- LEFT CONTENT --}}
            <div class="col-lg-7">
                <div class="about-page-card h-100">

                    <div class="section-heading about-page-heading">
                        <span class="sub-title">
                            <i class="bi bi-bank2"></i>
                            College Profile
                        </span>

                        <h2>
                            {{ $about->about_title ?? 'A respected academic institution' }}
                            <span>{{ $about->about_highlight ?? 'serving Patna since 1975.' }}</span>
                        </h2>
                    </div>

                    <p class="about-page-lead">
                        {{ $about->about_lead ?? 'Ram Krishna Dwarika College was established in 1975 with the magnanimity of Late Dwarika Mahto. After initial legal challenges, the institution shifted to its present location with the generous donation of land by Late Sri Shiv Narayan Rai.' }}
                    </p>

                    <p>
                        {{ $about->about_description ?? 'The foundation of the college was laid by Late Rao Birendra Singh, the then Chief Minister of Haryana, on 7th March 1975 at Punaichak. The college later moved to its present campus at Lohia Nagar, Kankarbagh, Patna.' }}
                    </p>

                    <div class="about-info-box">
                        <div class="about-info-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <div>
                            <h4>{{ $about->info_title ?? 'Constituent Unit of Patliputra University' }}</h4>
                            <p>
                                {{ $about->info_description ?? 'The college became a constituent unit of Magadh University, Bodh Gaya in 1986. Presently, it is a constituent unit of Patliputra University, Patna.' }}
                            </p>
                        </div>
                    </div>

                    <div class="about-page-points">
                        @foreach($points as $point)
                            @if($point)
                                <div>
                                    <i class="bi bi-check2-circle"></i>
                                    <span>{{ $point }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>

            {{-- RIGHT IMAGE / STATS --}}
            <div class="col-lg-5">
                <div class="about-media-card h-100">

                    <div class="about-media-img">
                        <img src="{{ $aboutImage }}" alt="Ram Krishna Dwarika College">
                    </div>

                    <div class="about-media-content">
                        <span>
                            <i class="bi bi-award-fill"></i>
                            Academic Identity
                        </span>

                        <h3>
                            {{ $about->media_title ?? 'Focused on student-centric learning and institutional growth.' }}
                        </h3>

                        <div class="about-stats-grid">
                            @foreach($stats as $stat)
                                <div>
                                    <strong>{{ $stat['value'] ?? '' }}</strong>
                                    <small>{{ $stat['label'] ?? '' }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<section class="history-profile-section">
    <div class="container">

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-6">
                <div class="history-card h-100">
                    <div class="history-card-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>

                    <span>Institutional Journey</span>
                    <h3>{{ $about->history_title ?? 'College History' }}</h3>

                    <p>
                        {{ $about->history_description ?? 'From its foundation in 1975 to its present academic presence, the institution has continuously worked to provide accessible higher education to students from urban and sub-urban backgrounds.' }}
                    </p>

                    <ul>
                        @foreach($historyItems as $index => $item)
                            <li>
                                <i class="{{ $historyIcons[$index] ?? 'bi bi-calendar-check' }}"></i>
                                <div>
                                    <strong>{{ $item['year'] ?? '' }}</strong>
                                    <small>{{ $item['text'] ?? '' }}</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="history-card profile-card h-100">
                    <div class="history-card-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <span>Academic Profile</span>
                    <h3>{{ $about->profile_title ?? 'Teaching, Learning & Development' }}</h3>

                    <p>
                        {{ $about->profile_description ?? 'The college has distinguished faculty members in Humanities, Social Science, Science and Commerce. It is known for academic results, student support and balanced development through academic and co-curricular activities.' }}
                    </p>

                    <div class="profile-tags">
                        @foreach($profileTags as $index => $tag)
                            @if($tag)
                                <span>
                                    <i class="{{ $profileIcons[$index] ?? 'bi bi-book-half' }}"></i>
                                    {{ $tag }}
                                </span>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<section class="vision-mission-section">
    <div class="vm-shape vm-shape-1"></div>
    <div class="vm-shape vm-shape-2"></div>

    <div class="container position-relative">

        <div class="section-title text-center vm-title">
            <span>
                <i class="bi bi-bullseye"></i>
                Vision & Mission
            </span>

            <h2>
                {{ $about->vm_title ?? 'Academic Vision and Institutional Mission' }}
            </h2>

            <p>
                {{ $about->vm_description ?? 'RKD College is committed to academic excellence, holistic development, technology-enabled learning and student progression.' }}
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-5">
                <div class="vm-card vision-card h-100">
                    <div class="vm-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <span>Our Vision</span>
                    <h3>{{ $about->vision_title ?? 'Aligned with NEP-2020' }}</h3>

                    <p>
                        {{ $about->vision_description ?? 'To integrate the college both in theory and practice with the National Education Policy - 2020, promoting innovative teaching, experiential learning, advanced evaluation and technology-enabled education.' }}
                    </p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="mission-grid">

                    @foreach($missions as $index => $mission)
                        <div class="mission-item">
                            <i class="{{ $missionIcons[$index] ?? 'bi bi-lightbulb-fill' }}"></i>
                            <h4>{{ $mission['title'] ?? '' }}</h4>
                            <p>{{ $mission['description'] ?? '' }}</p>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>

    </div>
</section>


  <!-- MOTTO START -->
  <section class="motto-section">
    <div class="container">
      <div class="motto-card">

        <div class="motto-icon">
          <i class="bi bi-stars"></i>
        </div>

        <div>
          <span>College Motto</span>
          <h2>तेजस्विनावधीतमस्तु</h2>
          <p>
            May our studies enlighten the world with the brilliance of understanding.
          </p>
        </div>

        <a href="contact.html" class="btn btn-main">
          Contact College
          <i class="bi bi-arrow-right"></i>
        </a>

      </div>
    </div>
  </section>
  <!-- MOTTO END -->

  @endsection