
@extends('frontend.master')
@section('content')


  <!-- PRINCIPAL INNER HERO START -->
  <section class="pm-hero-section">
    <div class="pm-hero-shape pm-hero-shape-1"></div>
    <div class="pm-hero-shape pm-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="pm-hero-content text-center">

        <span class="pm-kicker">
          <i class="bi bi-person-badge-fill"></i>
          Principal's Message
        </span>

        <h1>Message from the Principal</h1>

        <p>
          A message of academic excellence, student empowerment, holistic development
          and institutional commitment from the Principal of RKD College.
        </p>

        <nav class="pm-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <span>Principal's Message</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- PRINCIPAL INNER HERO END -->


  <!-- PRINCIPAL MESSAGE START -->
 @php
    $principalImage = ($principal && $principal->principal_image_url)
        ? $principal->principal_image_url
        : asset('assets/img/new_2025_pric.jpeg');

    $profilePoints = ($principal && !empty($principal->profile_points)) ? $principal->profile_points : [
        ['title' => 'Academic Leadership'],
        ['title' => 'Student Empowerment'],
    ];

    $profileIcons = [
        'bi bi-mortarboard-fill',
        'bi bi-people-fill',
    ];

    $messageParagraphs = ($principal && !empty($principal->message_paragraphs)) ? $principal->message_paragraphs : [
        'Welcome to Ramkrishna Dwarika Mahavidyalaya. Our institution is driven by a quest for excellence articulated in the vision, mission, goals and core values.',
        'Our institution caters to a large urban and sub-urban population belonging to different socio-economic backgrounds to get enrolled and pursue their dreams of a successful career.',
        'We aim to empower you to reach your full potential. Embrace opportunities for personal and professional growth, and be proactive in seeking out new challenges.',
        'Together, let us strive to achieve our collective goals, uphold the values of our college, and create an enriching and fulfilling educational experience. Wishing you all a successful and inspiring academic year ahead.',
    ];

    $buttonUrl = ($principal && $principal->button_url) ? $principal->button_url : 'contact.html';
@endphp

<section class="principal-message-page">
    <div class="pm-bg-shape pm-bg-shape-1"></div>
    <div class="pm-bg-shape pm-bg-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            {{-- PRINCIPAL PROFILE --}}
            <div class="col-lg-5">
                <div class="pm-profile-card h-100">

                    <div class="pm-profile-img">
                        <img src="{{ $principalImage }}"
                             alt="{{ $principal->principal_name ?? 'Principal' }}">
                    </div>

                    <div class="pm-profile-content">

                        <span>
                            <i class="bi bi-award-fill"></i>
                            {{ $principal->principal_label ?? 'Principal' }}
                        </span>

                        <h2>{{ $principal->principal_name ?? 'Prof. (Dr.) Diwakar Prasad' }}</h2>

                        <p>
                            {!! $principal->principal_designation ?? 'Principal, Ram Krishna Dwarika College,<br>Lohia Nagar, Patna - 20' !!}
                        </p>

                        <div class="pm-profile-points">
                            @foreach($profilePoints as $index => $point)
                                @if(!empty($point['title']))
                                    <div>
                                        <i class="{{ $profileIcons[$index] ?? 'bi bi-mortarboard-fill' }}"></i>
                                        <strong>{{ $point['title'] }}</strong>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>

            {{-- MESSAGE CONTENT --}}
            <div class="col-lg-7">
                <div class="pm-message-card h-100">

                    <div class="pm-message-head">
                        <span class="pm-subtitle">
                            <i class="bi bi-chat-quote-fill"></i>
                            {{ $principal->desk_label ?? 'Principal Desk' }}
                        </span>

                        <h2>{{ $principal->greeting_title ?? 'Dear Students,' }}</h2>
                    </div>

                    <div class="pm-message-body">

                        @foreach($messageParagraphs as $index => $paragraph)
                            @if($paragraph)
                                <p>{{ $paragraph }}</p>
                            @endif

                            @if($index === 2)
                                <div class="pm-highlight-box">
                                    <div class="pm-highlight-icon">
                                        <i class="bi bi-lightbulb-fill"></i>
                                    </div>

                                    <div>
                                        <h4>{{ $principal->highlight_title ?? 'Committed to NEP-2020' }}</h4>
                                        <p>
                                            {{ $principal->highlight_description ?? 'For holistic development of students, the college is committed to implement National Education Policy - 2020 in letter and spirit.' }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <div class="pm-signature">
                        <div>
                            <strong>{{ $principal->signature_name ?? 'Prof. (Dr.) Diwakar Prasad' }}</strong>
                            <span>{{ $principal->signature_designation ?? 'Principal, R.K.D College, Lohia Nagar Patna-20' }}</span>
                        </div>

                        <a href="{{ $buttonUrl }}" class="btn btn-main">
                            {{ $principal->button_text ?? 'Contact Office' }}
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
  <!-- PRINCIPAL MESSAGE END -->


  <!-- PRINCIPAL VALUES START -->
  <section class="pm-values-section">
    <div class="container">

      <div class="row g-3">

        <div class="col-lg-3 col-md-6">
          <div class="pm-value-card">
            <i class="bi bi-stars"></i>
            <h4>Excellence</h4>
            <p>Academic discipline and quality-focused learning environment.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="pm-value-card">
            <i class="bi bi-person-check-fill"></i>
            <h4>Empowerment</h4>
            <p>Supporting students to reach their full potential.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="pm-value-card">
            <i class="bi bi-diagram-3-fill"></i>
            <h4>Holistic Growth</h4>
            <p>Balanced development through academics and activities.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="pm-value-card">
            <i class="bi bi-lightbulb-fill"></i>
            <h4>NEP-2020</h4>
            <p>Committed to modern education policy and future-ready learning.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- PRINCIPAL VALUES END -->
@endsection