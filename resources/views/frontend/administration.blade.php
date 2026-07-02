

@extends('frontend.master')
@section('content')



  <!-- ADMINISTRATION HERO START -->
  <section class="admin-hero-section">
    <div class="admin-hero-shape admin-hero-shape-1"></div>
    <div class="admin-hero-shape admin-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="admin-hero-content text-center">

        <span class="admin-kicker">
          <i class="bi bi-diagram-3-fill"></i>
          About College
        </span>

        <h1>College Administration</h1>

        <p>
          Administrative structure of Ram Krishna Dwarika College, Patna for
          academic coordination, student support, examination, admission and office management.
        </p>

        <nav class="admin-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <a href="about.html">About Us</a>
          <i class="bi bi-chevron-right"></i>
          <span>Administration</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- ADMINISTRATION HERO END -->


  <!-- ADMINISTRATION OVERVIEW START -->
  <section class="administration-section">
    <div class="admin-bg-shape admin-bg-shape-1"></div>
    <div class="admin-bg-shape admin-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <!-- LEFT PROFILE -->
        <div class="col-lg-4">
          <div class="admin-lead-card h-100">

            <div class="admin-lead-icon">
              <i class="bi bi-person-badge-fill"></i>
            </div>

            <span>Administrative Head</span>

            <h2>Principal Office</h2>

            <p>
              The Principal’s office coordinates academic, administrative and
              student-support activities of the college in accordance with University
              and Government guidelines.
            </p>

            <div class="admin-principal-box">
              <img src="assets/img/new_2025_pric.jpeg" alt="Principal RKD College">

              <div>
                <strong>Principal</strong>
                <span>Ram Krishna Dwarika College, Patna</span>
              </div>
            </div>

            <div class="admin-contact-box">
              <p>
                <i class="bi bi-geo-alt-fill"></i>
                <span>Lohia Nagar, Kankarbagh, Patna - 800020</span>
              </p>

              <p>
                <i class="bi bi-telephone-fill"></i>
                <span>0612-2382713</span>
              </p>
            </div>

          </div>
        </div>

        <!-- RIGHT ADMINISTRATION CARDS -->
        <div class="col-lg-8">
          <div class="admin-panel-card h-100">

            <div class="admin-panel-head">
              <div>
                <span class="admin-subtitle">
                  <i class="bi bi-building-fill-gear"></i>
                  Administrative Units
                </span>

                <h2>Administrative Coordination</h2>
              </div>

              <a href="contact.html" class="btn btn-main">
                Contact Office
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <div class="admin-unit-grid">

              <div class="admin-unit-card">
                <div class="admin-unit-icon">
                  <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h4>Academic Administration</h4>
                <p>Coordination of academic departments, classes, curriculum and student learning support.</p>
              </div>

              <div class="admin-unit-card">
                <div class="admin-unit-icon">
                  <i class="bi bi-journal-bookmark-fill"></i>
                </div>
                <h4>Admission Section</h4>
                <p>Admission notices, document verification, fee process and university admission links.</p>
              </div>

              <div class="admin-unit-card">
                <div class="admin-unit-icon">
                  <i class="bi bi-clipboard2-check-fill"></i>
                </div>
                <h4>Examination Section</h4>
                <p>Exam forms, admit card notices, practical schedule, timetable and result coordination.</p>
              </div>

              <div class="admin-unit-card">
                <div class="admin-unit-icon">
                  <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <h4>Office & Records</h4>
                <p>Official correspondence, records, certificates, documents and general office support.</p>
              </div>

              <div class="admin-unit-card">
                <div class="admin-unit-icon">
                  <i class="bi bi-people-fill"></i>
                </div>
                <h4>Student Support</h4>
                <p>Scholarship, grievance, anti-ragging, NCC/NSS and student helpdesk support.</p>
              </div>

              <div class="admin-unit-card">
                <div class="admin-unit-icon">
                  <i class="bi bi-patch-check-fill"></i>
                </div>
                <h4>IQAC / NAAC</h4>
                <p>Quality assurance records, AQAR, SSR, feedback, meeting minutes and documentation.</p>
              </div>

            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ADMINISTRATION OVERVIEW END -->


  <!-- ADMINISTRATION STRUCTURE START -->
  <section class="admin-structure-section">
    <div class="container">

      <div class="section-title text-center admin-structure-title">
        <span>
          <i class="bi bi-diagram-3"></i>
          College Structure
        </span>

        <h2>Administrative Structure</h2>

        <p>
          A clean frontend structure for future backend integration of administrative members,
          committees and office responsibilities.
        </p>
      </div>

      <div class="admin-structure-grid">

        <div class="structure-card">
          <span class="structure-number">01</span>
          <i class="bi bi-person-badge-fill"></i>
          <h4>Principal</h4>
          <p>Overall academic and administrative leadership of the college.</p>
        </div>

        <div class="structure-card">
          <span class="structure-number">02</span>
          <i class="bi bi-bank2"></i>
          <h4>College Office</h4>
          <p>Office coordination, official communication and records management.</p>
        </div>

        <div class="structure-card">
          <span class="structure-number">03</span>
          <i class="bi bi-journal-check"></i>
          <h4>Admission Cell</h4>
          <p>Admission support, form guidance, documents and eligibility process.</p>
        </div>

        <div class="structure-card">
          <span class="structure-number">04</span>
          <i class="bi bi-clipboard-data-fill"></i>
          <h4>Examination Cell</h4>
          <p>Exam notices, admit cards, schedules, practical and result links.</p>
        </div>

        <div class="structure-card">
          <span class="structure-number">05</span>
          <i class="bi bi-columns-gap"></i>
          <h4>Departments</h4>
          <p>Arts, Science, Commerce and Vocational academic departments.</p>
        </div>

        <div class="structure-card">
          <span class="structure-number">06</span>
          <i class="bi bi-shield-check"></i>
          <h4>Cells & Committees</h4>
          <p>Grievance, anti-ragging, women cell, career and student support committees.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- ADMINISTRATION STRUCTURE END -->


  <!-- OFFICE SERVICES START -->
  <section class="admin-services-section">
    <div class="admin-service-shape admin-service-shape-1"></div>
    <div class="admin-service-shape admin-service-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <div class="col-lg-6">
          <div class="admin-service-card h-100">
            <div class="admin-service-head">
              <div class="admin-service-icon">
                <i class="bi bi-person-lines-fill"></i>
              </div>

              <div>
                <span>For Students</span>
                <h3>Student Related Office Support</h3>
              </div>
            </div>

            <div class="admin-service-list">
              <div>
                <i class="bi bi-check-circle-fill"></i>
                Admission support and document verification
              </div>

              <div>
                <i class="bi bi-check-circle-fill"></i>
                Examination form, admit card and result assistance
              </div>

              <div>
                <i class="bi bi-check-circle-fill"></i>
                Scholarship and certificate related support
              </div>

              <div>
                <i class="bi bi-check-circle-fill"></i>
                Student grievance and helpdesk coordination
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-6">
          <div class="admin-service-card h-100">
            <div class="admin-service-head">
              <div class="admin-service-icon">
                <i class="bi bi-folder-check"></i>
              </div>

              <div>
                <span>For Institution</span>
                <h3>Official Administration Work</h3>
              </div>
            </div>

            <div class="admin-service-list">
              <div>
                <i class="bi bi-check-circle-fill"></i>
                University correspondence and official documentation
              </div>

              <div>
                <i class="bi bi-check-circle-fill"></i>
                IQAC / NAAC document management and records
              </div>

              <div>
                <i class="bi bi-check-circle-fill"></i>
                Committee coordination and statutory disclosures
              </div>

              <div>
                <i class="bi bi-check-circle-fill"></i>
                Notice, circular, download and public information support
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- OFFICE SERVICES END -->
   @endsection