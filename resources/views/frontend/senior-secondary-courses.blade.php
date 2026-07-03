

@extends('frontend.master')
@section('content')

  <!-- SENIOR SECONDARY HERO START -->
  <section class="ssc-hero-section">
    <div class="ssc-hero-shape ssc-hero-shape-1"></div>
    <div class="ssc-hero-shape ssc-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="ssc-hero-content text-center">

        <span class="ssc-kicker">
          <i class="bi bi-journal-bookmark-fill"></i>
          Academics
        </span>

        <h1>Senior Secondary Courses</h1>

        <p>
          Senior Secondary course information of Ram Krishna Dwarika College, Patna,
          including course name, duration and eligibility details.
        </p>

        <nav class="ssc-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <a href="courses.html">Academics</a>
          <i class="bi bi-chevron-right"></i>
          <span>Senior Secondary Courses</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- SENIOR SECONDARY HERO END -->


  <!-- SENIOR SECONDARY COURSES START -->
  <section class="ssc-course-section">
    <div class="ssc-bg-shape ssc-bg-shape-1"></div>
    <div class="ssc-bg-shape ssc-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <!-- LEFT SUMMARY -->
        <div class="col-lg-4">
          <div class="ssc-summary-card h-100">

            <div class="ssc-summary-icon">
              <i class="bi bi-mortarboard-fill"></i>
            </div>

            <span>Course Overview</span>

            <h2>I.A / I.Sc / I.Com</h2>

            <p>
              Senior Secondary programmes are designed for students who have
              completed class 10th and want to continue higher secondary education
              in Arts, Science or Commerce stream.
            </p>

            <div class="ssc-summary-stats">
              <div>
                <strong>3</strong>
                <small>Streams</small>
              </div>

              <div>
                <strong>2</strong>
                <small>Years Duration</small>
              </div>

              <div>
                <strong>10th</strong>
                <small>Eligibility</small>
              </div>
            </div>

            <div class="ssc-info-note">
              <i class="bi bi-info-circle-fill"></i>
              <div>
                <strong>Eligibility</strong>
                <span>10th Pass, subject selection as per college/university norms.</span>
              </div>
            </div>

          </div>
        </div>

        <!-- RIGHT COURSES -->
        <div class="col-lg-8">
          <div class="ssc-panel-card h-100">

            <div class="ssc-panel-head">
              <div>
                <span class="ssc-subtitle">
                  <i class="bi bi-list-check"></i>
                  Available Streams
                </span>

                <h2>Senior Secondary Course Details</h2>
              </div>

              <a href="admission.html" class="btn btn-main">
                Admission Details
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <div class="ssc-stream-grid">

              <div class="ssc-stream-card">
                <div class="ssc-stream-icon">
                  <i class="bi bi-book-half"></i>
                </div>

                <span>Arts Stream</span>
                <h4>I.A</h4>
                <p>Intermediate of Arts for students interested in humanities and social science subjects.</p>

                <div class="ssc-meta">
                  <div><i class="bi bi-clock"></i> 2 Years</div>
                  <div><i class="bi bi-person-check"></i> 10th Pass</div>
                </div>
              </div>

              <div class="ssc-stream-card">
                <div class="ssc-stream-icon">
                  <i class="bi bi-activity"></i>
                </div>

                <span>Science Stream</span>
                <h4>I.Sc</h4>
                <p>Intermediate of Science for students interested in science, mathematics and laboratory learning.</p>

                <div class="ssc-meta">
                  <div><i class="bi bi-clock"></i> 2 Years</div>
                  <div><i class="bi bi-person-check"></i> 10th Pass</div>
                </div>
              </div>

              <div class="ssc-stream-card">
                <div class="ssc-stream-icon">
                  <i class="bi bi-graph-up-arrow"></i>
                </div>

                <span>Commerce Stream</span>
                <h4>I.Com</h4>
                <p>Intermediate of Commerce for students interested in business, accounting and finance studies.</p>

                <div class="ssc-meta">
                  <div><i class="bi bi-clock"></i> 2 Years</div>
                  <div><i class="bi bi-person-check"></i> 10th Pass</div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- SENIOR SECONDARY COURSES END -->


  <!-- COURSE TABLE START -->
  <section class="ssc-table-section">
    <div class="container">

      <div class="ssc-table-card">

        <div class="ssc-table-head">
          <div>
            <span class="ssc-subtitle">
              <i class="bi bi-table"></i>
              Official Course Table
            </span>

            <h2>Course Name, Duration & Eligibility</h2>
          </div>

          <a href="downloads.html" class="btn btn-outline-main">
            Downloads
            <i class="bi bi-download"></i>
          </a>
        </div>

        <div class="ssc-table-wrap">
          <table class="ssc-course-table">
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
                <td>I.A / I.Sc / I.Com</td>
                <td><span class="course-badge">2 Years</span></td>
                <td>10th Pass (As per Subject)</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>

    </div>
  </section>
  <!-- COURSE TABLE END -->


  <!-- ADMISSION HELP START -->
  <section class="ssc-help-section">
    <div class="ssc-help-shape ssc-help-shape-1"></div>
    <div class="ssc-help-shape ssc-help-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4">

        <div class="col-lg-4 col-md-6">
          <div class="ssc-help-card">
            <i class="bi bi-file-earmark-text-fill"></i>
            <h4>Required Documents</h4>
            <p>Marksheet, transfer certificate, photo, ID proof and other admission documents as notified.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="ssc-help-card">
            <i class="bi bi-megaphone-fill"></i>
            <h4>Admission Notice</h4>
            <p>Students should check admission notices and college updates regularly before applying.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="ssc-help-card">
            <i class="bi bi-telephone-fill"></i>
            <h4>Admission Helpdesk</h4>
            <p>For admission or examination enquiry, contact the college office through official numbers.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ADMISSION HELP END -->
@endsection