
@extends('frontend.master')
@section('content')
  <!-- PG HERO START -->
  <section class="pg-hero-section">
    <div class="pg-hero-shape pg-hero-shape-1"></div>
    <div class="pg-hero-shape pg-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="pg-hero-content text-center">

        <span class="pg-kicker">
          <i class="bi bi-mortarboard-fill"></i>
          Academics
        </span>

        <h1>Post Graduate Courses</h1>

        <p>
          Post Graduate programme information of Ram Krishna Dwarika College,
          Patna including M.A. and M.Com courses with subject, duration and eligibility details.
        </p>

        <nav class="pg-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <a href="courses.html">Academics</a>
          <i class="bi bi-chevron-right"></i>
          <span>Post Graduate Courses</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- PG HERO END -->


  <!-- PG COURSE OVERVIEW START -->
  <section class="pg-course-section">
    <div class="pg-bg-shape pg-bg-shape-1"></div>
    <div class="pg-bg-shape pg-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <!-- LEFT SUMMARY -->
        <div class="col-lg-4">
          <div class="pg-summary-card h-100">

            <div class="pg-summary-icon">
              <i class="bi bi-journal-richtext"></i>
            </div>

            <span>PG Course Overview</span>

            <h2>M.A. / M.Com</h2>

            <p>
              RKD College offers Post Graduate programmes in selected Arts and
              Commerce subjects as per college and university academic structure.
            </p>

            <div class="pg-summary-stats">
              <div>
                <strong>2</strong>
                <small>Programmes</small>
              </div>

              <div>
                <strong>5</strong>
                <small>Subjects</small>
              </div>

              <div>
                <strong>4</strong>
                <small>Semesters</small>
              </div>
            </div>

            <div class="pg-info-note">
              <i class="bi bi-info-circle-fill"></i>
              <div>
                <strong>Duration</strong>
                <span>2 Years / Four Semester Post Graduate programme.</span>
              </div>
            </div>

          </div>
        </div>

        <!-- RIGHT PROGRAMS -->
        <div class="col-lg-8">
          <div class="pg-panel-card h-100">

            <div class="pg-panel-head">
              <div>
                <span class="pg-subtitle">
                  <i class="bi bi-list-check"></i>
                  Available PG Programmes
                </span>

                <h2>Post Graduate Programme Details</h2>
              </div>

              <a href="admission.html" class="btn btn-main">
                Admission Details
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <div class="pg-program-grid">

              <div class="pg-program-card">
                <div class="pg-program-icon">
                  <i class="bi bi-book-half"></i>
                </div>

                <span>Arts Faculty</span>
                <h4>M.A.</h4>

                <p>
                  Master of Arts programme available in Political Science,
                  History, Geography and Economics.
                </p>

                <div class="pg-meta">
                  <div><i class="bi bi-clock"></i> 2 Years / Four Semester</div>
                  <div><i class="bi bi-person-check"></i> Graduation in Arts</div>
                </div>
              </div>

              <div class="pg-program-card">
                <div class="pg-program-icon">
                  <i class="bi bi-calculator-fill"></i>
                </div>

                <span>Commerce Faculty</span>
                <h4>M.Com</h4>

                <p>
                  Master of Commerce programme available for students from
                  commerce graduation background.
                </p>

                <div class="pg-meta">
                  <div><i class="bi bi-clock"></i> 2 Years / Four Semester</div>
                  <div><i class="bi bi-person-check"></i> Graduation in Commerce</div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- PG COURSE OVERVIEW END -->


  <!-- PG SUBJECTS START -->
  <section class="pg-subject-section">
    <div class="container">

      <div class="section-title text-center pg-subject-title">
        <span>
          <i class="bi bi-columns-gap"></i>
          PG Subjects
        </span>

        <h2>Subject Wise PG Courses</h2>

        <p>
          Official Post Graduate courses are available in Arts and Commerce streams.
        </p>
      </div>

      <div class="pg-subject-grid">

        <div class="pg-subject-card">
          <div class="pg-subject-icon">
            <i class="bi bi-bank2"></i>
          </div>

          <span>Political Science</span>
          <h4>M.A. Political Science</h4>
          <p>Post Graduate course for students from Arts background.</p>

          <div class="pg-subject-foot">
            <small>Duration: 2 Years</small>
            <small>Mode: Regular</small>
          </div>
        </div>

        <div class="pg-subject-card">
          <div class="pg-subject-icon">
            <i class="bi bi-clock-history"></i>
          </div>

          <span>History</span>
          <h4>M.A. History</h4>
          <p>Post Graduate course under Arts faculty with four semester structure.</p>

          <div class="pg-subject-foot">
            <small>Duration: 2 Years</small>
            <small>Mode: Regular</small>
          </div>
        </div>

        <div class="pg-subject-card">
          <div class="pg-subject-icon">
            <i class="bi bi-globe-asia-australia"></i>
          </div>

          <span>Geography</span>
          <h4>M.A. Geography</h4>
          <p>Post Graduate course with academic focus on geography studies.</p>

          <div class="pg-subject-foot">
            <small>Duration: 2 Years</small>
            <small>Mode: Regular</small>
          </div>
        </div>

        <div class="pg-subject-card">
          <div class="pg-subject-icon">
            <i class="bi bi-graph-up-arrow"></i>
          </div>

          <span>Economics</span>
          <h4>M.A. Economics</h4>
          <p>Post Graduate course for economics and social science studies.</p>

          <div class="pg-subject-foot">
            <small>Duration: 2 Years</small>
            <small>Mode: Regular</small>
          </div>
        </div>

        <div class="pg-subject-card">
          <div class="pg-subject-icon">
            <i class="bi bi-calculator-fill"></i>
          </div>

          <span>Commerce</span>
          <h4>M.Com Commerce</h4>
          <p>Post Graduate course for commerce and finance studies.</p>

          <div class="pg-subject-foot">
            <small>Duration: 2 Years</small>
            <small>Mode: Regular</small>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- PG SUBJECTS END -->


  <!-- PG TABLE START -->
  <section class="pg-table-section">
    <div class="pg-table-shape pg-table-shape-1"></div>
    <div class="pg-table-shape pg-table-shape-2"></div>

    <div class="container position-relative">

      <div class="pg-table-card">

        <div class="pg-table-head">
          <div>
            <span class="pg-subtitle">
              <i class="bi bi-table"></i>
              Official PG Structure
            </span>

            <h2>Course, Duration & Eligibility</h2>
          </div>

          <a href="downloads.html" class="btn btn-outline-main">
            Downloads
            <i class="bi bi-download"></i>
          </a>
        </div>

        <div class="pg-table-wrap">
          <table class="pg-course-table">
            <thead>
              <tr>
                <th>SL. No.</th>
                <th>Course Name</th>
                <th>Subjects</th>
                <th>Duration</th>
                <th>Eligibility</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>M.A.</td>
                <td>Political Science, History, Geography, Economics</td>
                <td><span class="pg-course-badge">2 Years / Four Semester</span></td>
                <td>Graduation in Arts</td>
              </tr>

              <tr>
                <td>2</td>
                <td>M.Com</td>
                <td>Commerce</td>
                <td><span class="pg-course-badge">2 Years / Four Semester</span></td>
                <td>Graduation in Commerce</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>

    </div>
  </section>
  <!-- PG TABLE END -->


  <!-- PG HELP START -->
  <section class="pg-help-section">
    <div class="container">

      <div class="row g-4">

        <div class="col-lg-4 col-md-6">
          <div class="pg-help-card">
            <i class="bi bi-file-earmark-text-fill"></i>
            <h4>Admission Documents</h4>
            <p>Graduation marksheet, certificates, ID proof, photo and other required documents as notified.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="pg-help-card">
            <i class="bi bi-megaphone-fill"></i>
            <h4>Admission Notice</h4>
            <p>Students should check PG admission notices and college updates regularly before applying.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="pg-help-card">
            <i class="bi bi-telephone-fill"></i>
            <h4>PG Enquiry</h4>
            <p>For PG department enquiry, students may contact the college office through official numbers.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- PG HELP END -->
   @endsection