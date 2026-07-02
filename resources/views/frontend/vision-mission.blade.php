@extends('frontend.master')
@section('content')




  <!-- VISION MISSION HERO START -->
  <section class="vm-page-hero">
    <div class="vm-hero-shape vm-hero-shape-1"></div>
    <div class="vm-hero-shape vm-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="vm-hero-content text-center">

        <span class="vm-page-kicker">
          <i class="bi bi-bullseye"></i>
          About College
        </span>

        <h1>Vision & Mission</h1>

        <p>
          Institutional vision and mission of Ram Krishna Dwarika College, Patna,
          focused on quality education, holistic development and NEP-2020 aligned learning.
        </p>

        <nav class="vm-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <a href="about.html">About Us</a>
          <i class="bi bi-chevron-right"></i>
          <span>Vision & Mission</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- VISION MISSION HERO END -->


  <!-- VISION MISSION MAIN START -->
 @php
    $visionPoints = ($visionMission && !empty($visionMission->vision_points)) ? $visionMission->vision_points : [
        'Experiential learning',
        'Innovative teaching',
        'Advanced evaluation',
        'Technology-enabled education',
    ];

    $missionPoints = ($visionMission && !empty($visionMission->mission_points)) ? $visionMission->mission_points : [
        'Quality education',
        'Student exposure',
        'Innovative practices',
        'Integrity, respect & service',
    ];
@endphp

<section class="vm-page-section">
    <div class="vm-page-shape vm-page-shape-1"></div>
    <div class="vm-page-shape vm-page-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            {{-- VISION --}}
            <div class="col-lg-6">
                <div class="vm-main-card vision-main-card h-100">

                    <div class="vm-main-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <span>Our Vision</span>

                    <h2>
                        {{ $visionMission->vision_title ?? 'NEP-2020 aligned academic development.' }}
                    </h2>

                    <p>
                        {{ $visionMission->vision_description ?? 'To integrate the college both in theory and practice with the National Education Policy - 2020 and promote a modern academic environment for students.' }}
                    </p>

                    <div class="vm-highlight">
                        <i class="bi bi-stars"></i>
                        <p>
                            {{ $visionMission->vision_highlight ?? 'NEP-2020 emphasizes experiential learning, innovative teaching, advanced evaluation techniques, teacher training and technology-enabled education.' }}
                        </p>
                    </div>

                    <div class="vm-points">
                        @foreach($visionPoints as $point)
                            @if($point)
                                <div>
                                    <i class="bi bi-check-circle-fill"></i>
                                    {{ $point }}
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>

            {{-- MISSION --}}
            <div class="col-lg-6">
                <div class="vm-main-card mission-main-card h-100">

                    <div class="vm-main-icon">
                        <i class="bi bi-flag-fill"></i>
                    </div>

                    <span>Our Mission</span>

                    <h2>
                        {{ $visionMission->mission_title ?? 'Quality education with meaningful exposure.' }}
                    </h2>

                    <p>
                        {{ $visionMission->mission_description ?? 'Our mission is to make R.K.D. College, Patna better in terms of quality education and exposure to students, and to equip them to cope with the latest requirements of the present world scenario.' }}
                    </p>

                    <div class="vm-highlight">
                        <i class="bi bi-lightbulb-fill"></i>
                        <p>
                            {{ $visionMission->mission_highlight ?? 'The college is committed to meaningful education through innovative techniques and practices with values of integrity, respect and service.' }}
                        </p>
                    </div>

                    <div class="vm-points">
                        @foreach($missionPoints as $point)
                            @if($point)
                                <div>
                                    <i class="bi bi-check-circle-fill"></i>
                                    {{ $point }}
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

  <!-- VISION MISSION MAIN END -->


  <!-- OBJECTIVES START -->
  <section class="vm-objectives-section">
    <div class="container">

      <div class="section-title text-center vm-objectives-title">
        <span>
          <i class="bi bi-list-check"></i>
          Institutional Objectives
        </span>

        <h2>Academic Goals & Development Priorities</h2>

        <p>
          The college works to support balanced student development through academics,
          skill-building, social responsibility and modern teaching-learning methods.
        </p>
      </div>

      <div class="vm-objective-grid">

        <div class="vm-objective-card">
          <div class="vm-objective-icon">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <h4>Quality Learning</h4>
          <p>Promote quality classroom learning, academic discipline and student progression.</p>
        </div>

        <div class="vm-objective-card">
          <div class="vm-objective-icon">
            <i class="bi bi-person-workspace"></i>
          </div>
          <h4>Skill Development</h4>
          <p>Encourage practical exposure, vocational learning and career-focused skills.</p>
        </div>

        <div class="vm-objective-card">
          <div class="vm-objective-icon">
            <i class="bi bi-laptop-fill"></i>
          </div>
          <h4>Technology Enabled</h4>
          <p>Strengthen ICT-based learning, digital resources and modern evaluation methods.</p>
        </div>

        <div class="vm-objective-card">
          <div class="vm-objective-icon">
            <i class="bi bi-people-fill"></i>
          </div>
          <h4>Inclusive Education</h4>
          <p>Support students from diverse socio-economic backgrounds with equal opportunity.</p>
        </div>

        <div class="vm-objective-card">
          <div class="vm-objective-icon">
            <i class="bi bi-heart-fill"></i>
          </div>
          <h4>Holistic Growth</h4>
          <p>Encourage intellectual, physical, moral, emotional and cultural development.</p>
        </div>

        <div class="vm-objective-card">
          <div class="vm-objective-icon">
            <i class="bi bi-patch-check-fill"></i>
          </div>
          <h4>Institutional Quality</h4>
          <p>Maintain quality assurance, feedback, documentation and continuous improvement.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- OBJECTIVES END -->


  <!-- CORE VALUES START -->
  <section class="vm-values-section">
    <div class="vm-values-shape vm-values-shape-1"></div>
    <div class="vm-values-shape vm-values-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <div class="col-lg-5">
          <div class="vm-value-lead h-100">

            <div class="vm-value-icon">
              <i class="bi bi-gem"></i>
            </div>

            <span>Core Values</span>

            <h2>Learning, Love and Service.</h2>

            <p>
              The institutional values of integrity, respect and service guide the
              college in its academic and student-support activities.
            </p>

            <a href="about.html" class="btn btn-main">
              About College
              <i class="bi bi-arrow-right"></i>
            </a>

          </div>
        </div>

        <div class="col-lg-7">
          <div class="vm-values-grid">

            <div class="vm-value-item">
              <i class="bi bi-shield-check"></i>
              <h4>Integrity</h4>
              <p>Promoting honest academic conduct and institutional responsibility.</p>
            </div>

            <div class="vm-value-item">
              <i class="bi bi-hand-thumbs-up-fill"></i>
              <h4>Respect</h4>
              <p>Encouraging mutual respect among students, teachers and staff.</p>
            </div>

            <div class="vm-value-item">
              <i class="bi bi-heart-pulse-fill"></i>
              <h4>Service</h4>
              <p>Developing a student community with commitment towards society.</p>
            </div>

            <div class="vm-value-item">
              <i class="bi bi-award-fill"></i>
              <h4>Excellence</h4>
              <p>Working continuously for academic excellence and better outcomes.</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- CORE VALUES END -->


  <!-- MOTTO START -->
  <section class="vm-motto-section">
    <div class="container">
      <div class="vm-motto-card">

        <div class="vm-motto-icon">
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