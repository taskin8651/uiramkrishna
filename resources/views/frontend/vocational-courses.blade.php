
@extends('frontend.master')
@section('content')

  <!-- VOCATIONAL HERO START -->
  <section class="voc-hero-section">
    <div class="voc-hero-shape voc-hero-shape-1"></div>
    <div class="voc-hero-shape voc-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="voc-hero-content text-center">

        <span class="voc-kicker">
          <i class="bi bi-pc-display-horizontal"></i>
          Academics
        </span>

        <h1>Vocational Courses</h1>

        <p>
          Career-oriented vocational programmes offered by Ram Krishna Dwarika College,
          Patna with duration and eligibility details.
        </p>

        <nav class="voc-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <a href="courses.html">Academics</a>
          <i class="bi bi-chevron-right"></i>
          <span>Vocational Courses</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- VOCATIONAL HERO END -->


  <!-- VOCATIONAL OVERVIEW START -->
  <section class="voc-course-section">
    <div class="voc-bg-shape voc-bg-shape-1"></div>
    <div class="voc-bg-shape voc-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <!-- LEFT SUMMARY -->
        <div class="col-lg-4">
          <div class="voc-summary-card h-100">

            <div class="voc-summary-icon">
              <i class="bi bi-briefcase-fill"></i>
            </div>

            <span>Vocational Overview</span>

            <h2>Career-Oriented Courses</h2>

            <p>
              RKD College offers vocational courses designed to support practical
              learning, professional skills and career-focused academic pathways.
            </p>

            <div class="voc-summary-stats">
              <div>
                <strong>5</strong>
                <small>Courses</small>
              </div>

              <div>
                <strong>3</strong>
                <small>Years</small>
              </div>

              <div>
                <strong>12th</strong>
                <small>Eligibility</small>
              </div>
            </div>

            <div class="voc-info-note">
              <i class="bi bi-info-circle-fill"></i>
              <div>
                <strong>Admission Eligibility</strong>
                <span>Course-wise eligibility is based on 12th pass qualification and subject requirement.</span>
              </div>
            </div>

          </div>
        </div>

        <!-- RIGHT PROGRAMS -->
        <div class="col-lg-8">
          <div class="voc-panel-card h-100">

            <div class="voc-panel-head">
              <div>
                <span class="voc-subtitle">
                  <i class="bi bi-list-check"></i>
                  Available Vocational Programmes
                </span>

                <h2>Vocational Course Details</h2>
              </div>

              <a href="admission.html" class="btn btn-main">
                Admission Details
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <div class="voc-program-grid">

              <div class="voc-program-card">
                <div class="voc-program-icon">
                  <i class="bi bi-code-slash"></i>
                </div>

                <span>Computer Application</span>
                <h4>B.C.A</h4>

                <p>
                  Bachelor of Computer Applications for students interested in software,
                  programming and computer application studies.
                </p>

                <div class="voc-meta">
                  <div><i class="bi bi-clock"></i> 3 Years</div>
                  <div><i class="bi bi-person-check"></i> 12th Pass (I.Sc)</div>
                </div>
              </div>

              <div class="voc-program-card">
                <div class="voc-program-icon">
                  <i class="bi bi-briefcase-fill"></i>
                </div>

                <span>Management</span>
                <h4>B.B.M</h4>

                <p>
                  Bachelor of Business Management for management, business and
                  administration-oriented learning.
                </p>

                <div class="voc-meta">
                  <div><i class="bi bi-clock"></i> 3 Years</div>
                  <div><i class="bi bi-person-check"></i> 12th Pass</div>
                </div>
              </div>

              <div class="voc-program-card">
                <div class="voc-program-icon">
                  <i class="bi bi-person-workspace"></i>
                </div>

                <span>Professional Studies</span>
                <h4>A.S.P.M</h4>

                <p>
                  Applied professional course with focus on structured vocational
                  learning and skill-oriented academics.
                </p>

                <div class="voc-meta">
                  <div><i class="bi bi-clock"></i> 3 Years</div>
                  <div><i class="bi bi-person-check"></i> 12th Pass (I.Sc)</div>
                </div>
              </div>

              <div class="voc-program-card">
                <div class="voc-program-icon">
                  <i class="bi bi-laptop-fill"></i>
                </div>

                <span>Information Technology</span>
                <h4>B.Sc. (IT)</h4>

                <p>
                  Bachelor of Science in Information Technology for digital,
                  computing and IT-based career pathways.
                </p>

                <div class="voc-meta">
                  <div><i class="bi bi-clock"></i> 3 Years</div>
                  <div><i class="bi bi-person-check"></i> 12th Pass</div>
                </div>
              </div>

              <div class="voc-program-card">
                <div class="voc-program-icon">
                  <i class="bi bi-airplane-fill"></i>
                </div>

                <span>Travel & Tourism</span>
                <h4>T.T.M</h4>

                <p>
                  Travel and Tourism Management course for tourism, hospitality
                  and travel service-oriented careers.
                </p>

                <div class="voc-meta">
                  <div><i class="bi bi-clock"></i> 3 Years</div>
                  <div><i class="bi bi-person-check"></i> 12th Pass</div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- VOCATIONAL OVERVIEW END -->


  <!-- VOCATIONAL TABLE START -->
  <section class="voc-table-section">
    <div class="voc-table-shape voc-table-shape-1"></div>
    <div class="voc-table-shape voc-table-shape-2"></div>

    <div class="container position-relative">

      <div class="voc-table-card">

        <div class="voc-table-head">
          <div>
            <span class="voc-subtitle">
              <i class="bi bi-table"></i>
              Official Vocational Structure
            </span>

            <h2>Course, Duration & Eligibility</h2>
          </div>

          <a href="downloads.html" class="btn btn-outline-main">
            Downloads
            <i class="bi bi-download"></i>
          </a>
        </div>

        <div class="voc-table-wrap">
          <table class="voc-course-table">
            <thead>
              <tr>
                <th>SL. No.</th>
                <th>Course Name</th>
                <th>Duration</th>
                <th>Eligibility</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>B.C.A</td>
                <td><span class="voc-course-badge">3 Years</span></td>
                <td>12th Pass (I.Sc)</td>
              </tr>

              <tr>
                <td>2</td>
                <td>B.B.M</td>
                <td><span class="voc-course-badge">3 Years</span></td>
                <td>12th Pass (As per Subject)</td>
              </tr>

              <tr>
                <td>3</td>
                <td>A.S.P.M</td>
                <td><span class="voc-course-badge">3 Years</span></td>
                <td>12th Pass (I.Sc)</td>
              </tr>

              <tr>
                <td>4</td>
                <td>B.Sc. (IT)</td>
                <td><span class="voc-course-badge">3 Years</span></td>
                <td>12th Pass</td>
              </tr>

              <tr>
                <td>5</td>
                <td>T.T.M</td>
                <td><span class="voc-course-badge">3 Years</span></td>
                <td>12th Pass</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>

    </div>
  </section>
  <!-- VOCATIONAL TABLE END -->


  <!-- VOCATIONAL GUIDANCE START -->
  <section class="voc-guidance-section">
    <div class="container">

      <div class="section-title text-center voc-guidance-title">
        <span>
          <i class="bi bi-stars"></i>
          Student Guidance
        </span>

        <h2>Vocational Admission Support</h2>

        <p>
          Students should verify latest admission notices, eligibility and document requirements
          before applying for vocational courses.
        </p>
      </div>

      <div class="row g-4">

        <div class="col-lg-4 col-md-6">
          <div class="voc-help-card">
            <i class="bi bi-file-earmark-text-fill"></i>
            <h4>Required Documents</h4>
            <p>12th marksheet, photo, ID proof, migration/TC and other documents as notified by college.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="voc-help-card">
            <i class="bi bi-megaphone-fill"></i>
            <h4>Admission Notice</h4>
            <p>Check official college admission notice and course availability before application.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="voc-help-card">
            <i class="bi bi-telephone-fill"></i>
            <h4>Vocational Helpdesk</h4>
            <p>Contact college office for vocational admission, documents and eligibility related queries.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- VOCATIONAL GUIDANCE END -->

  @endsection