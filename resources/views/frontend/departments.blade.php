@extends('frontend.master')
@section('content')


  <!-- DEPARTMENTS HERO START -->
  <section class="dept-hero-section">
    <div class="dept-hero-shape dept-hero-shape-1"></div>
    <div class="dept-hero-shape dept-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="dept-hero-content text-center">

        <span class="dept-kicker">
          <i class="bi bi-columns-gap"></i>
          Academics
        </span>

        <h1>Departments</h1>

        <p>
          Academic departments of Ram Krishna Dwarika College, Patna across
          Humanities, Social Science, Science, Commerce and Vocational streams.
        </p>

        <nav class="dept-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <a href="courses.html">Academics</a>
          <i class="bi bi-chevron-right"></i>
          <span>Departments</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- DEPARTMENTS HERO END -->


  <!-- DEPARTMENTS OVERVIEW START -->
  <section class="dept-overview-section">
    <div class="dept-bg-shape dept-bg-shape-1"></div>
    <div class="dept-bg-shape dept-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <!-- LEFT SUMMARY -->
        <div class="col-lg-4">
          <div class="dept-summary-card h-100">

            <div class="dept-summary-icon">
              <i class="bi bi-bank2"></i>
            </div>

            <span>Department Overview</span>

            <h2>Academic Faculties</h2>

            <p>
              RKD College has distinguished faculty members in Humanities, Social
              Science, Science and Commerce, supporting quality academic outcomes.
            </p>

            <div class="dept-summary-stats">
              <div>
                <strong>20</strong>
                <small>UG Departments</small>
              </div>

              <div>
                <strong>5</strong>
                <small>PG Departments</small>
              </div>

              <div>
                <strong>5</strong>
                <small>Vocational Courses</small>
              </div>
            </div>

            <div class="dept-info-note">
              <i class="bi bi-info-circle-fill"></i>
              <div>
                <strong>Academic Structure</strong>
                <span>Departments are grouped under Humanities, Social Science, Science, Commerce and Vocational streams.</span>
              </div>
            </div>

          </div>
        </div>

        <!-- RIGHT FACULTIES -->
        <div class="col-lg-8">
          <div class="dept-panel-card h-100">

            <div class="dept-panel-head">
              <div>
                <span class="dept-subtitle">
                  <i class="bi bi-diagram-3-fill"></i>
                  Faculty Wise Structure
                </span>

                <h2>Departments by Academic Stream</h2>
              </div>

              <a href="faculty.html" class="btn btn-main">
                Faculty Details
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <div class="dept-faculty-grid">

              <div class="dept-faculty-card">
                <div class="dept-faculty-icon">
                  <i class="bi bi-people-fill"></i>
                </div>

                <span>Faculty A</span>
                <h4>Social Science</h4>
                <p>Departments focused on society, economy, history, geography and public studies.</p>
              </div>

              <div class="dept-faculty-card">
                <div class="dept-faculty-icon">
                  <i class="bi bi-translate"></i>
                </div>

                <span>Faculty B</span>
                <h4>Humanities</h4>
                <p>Language, literature, philosophy and classical studies departments.</p>
              </div>

              <div class="dept-faculty-card">
                <div class="dept-faculty-icon">
                  <i class="bi bi-bezier2"></i>
                </div>

                <span>Faculty C</span>
                <h4>Science</h4>
                <p>Core science departments with theory and laboratory-oriented learning.</p>
              </div>

              <div class="dept-faculty-card">
                <div class="dept-faculty-icon">
                  <i class="bi bi-calculator-fill"></i>
                </div>

                <span>Faculty D</span>
                <h4>Commerce</h4>
                <p>Commerce education with accounting, finance and business-oriented studies.</p>
              </div>

            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- DEPARTMENTS OVERVIEW END -->


  <!-- DEPARTMENT LIST START -->
  <section class="dept-list-section">
    <div class="container">

      <div class="section-title text-center dept-list-title">
        <span>
          <i class="bi bi-list-check"></i>
          Department List
        </span>

        <h2>Academic Departments</h2>

        <p>
          Original department structure organized stream-wise for easy student access.
        </p>
      </div>

      <div class="dept-list-grid">

        <!-- SOCIAL SCIENCE -->
        <div class="dept-list-card">
          <div class="dept-list-head">
            <div class="dept-list-icon">
              <i class="bi bi-people-fill"></i>
            </div>

            <div>
              <span>Social Science</span>
              <h4>Departments</h4>
            </div>
          </div>

          <div class="dept-chip-list">
            <a href="#">AI & AS</a>
            <a href="#">Economics</a>
            <a href="#">Geography</a>
            <a href="#">History</a>
            <a href="#">Political Science</a>
            <a href="#">Psychology</a>
            <a href="#">Sociology</a>
          </div>
        </div>

        <!-- HUMANITIES -->
        <div class="dept-list-card">
          <div class="dept-list-head">
            <div class="dept-list-icon">
              <i class="bi bi-book-half"></i>
            </div>

            <div>
              <span>Humanities</span>
              <h4>Departments</h4>
            </div>
          </div>

          <div class="dept-chip-list">
            <a href="#">English</a>
            <a href="#">Hindi</a>
            <a href="#">Maithili</a>
            <a href="#">Pali</a>
            <a href="#">Philosophy</a>
            <a href="#">Sanskrit</a>
            <a href="#">Urdu</a>
          </div>
        </div>

        <!-- SCIENCE -->
        <div class="dept-list-card">
          <div class="dept-list-head">
            <div class="dept-list-icon">
              <i class="bi bi-activity"></i>
            </div>

            <div>
              <span>Science</span>
              <h4>Departments</h4>
            </div>
          </div>

          <div class="dept-chip-list">
            <a href="#">Botany</a>
            <a href="#">Chemistry</a>
            <a href="#">Mathematics</a>
            <a href="#">Physics</a>
            <a href="#">Zoology</a>
          </div>
        </div>

        <!-- COMMERCE -->
        <div class="dept-list-card">
          <div class="dept-list-head">
            <div class="dept-list-icon">
              <i class="bi bi-graph-up-arrow"></i>
            </div>

            <div>
              <span>Commerce</span>
              <h4>Department</h4>
            </div>
          </div>

          <div class="dept-chip-list">
            <a href="#">Commerce</a>
            <a href="#">Accounts</a>
            <a href="#">Business Studies</a>
            <a href="#">Finance</a>
          </div>
        </div>

        <!-- VOCATIONAL -->
        <div class="dept-list-card dept-voc-card">
          <div class="dept-list-head">
            <div class="dept-list-icon">
              <i class="bi bi-pc-display-horizontal"></i>
            </div>

            <div>
              <span>Vocational</span>
              <h4>Courses / Departments</h4>
            </div>
          </div>

          <div class="dept-chip-list">
            <a href="vocational-courses.html">B.C.A</a>
            <a href="vocational-courses.html">B.B.M</a>
            <a href="vocational-courses.html">A.S.P.M</a>
            <a href="vocational-courses.html">B.Sc. (IT)</a>
            <a href="vocational-courses.html">T.T.M</a>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- DEPARTMENT LIST END -->


  <!-- DEPARTMENT TABLE START -->
  <section class="dept-table-section">
    <div class="dept-table-shape dept-table-shape-1"></div>
    <div class="dept-table-shape dept-table-shape-2"></div>

    <div class="container position-relative">

      <div class="dept-table-card">

        <div class="dept-table-head">
          <div>
            <span class="dept-subtitle">
              <i class="bi bi-table"></i>
              Department Summary
            </span>

            <h2>Stream Wise Department Details</h2>
          </div>

          <a href="courses.html" class="btn btn-outline-main">
            View Courses
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="dept-table-wrap">
          <table class="dept-course-table">
            <thead>
              <tr>
                <th>SL. No.</th>
                <th>Stream / Faculty</th>
                <th>Departments / Subjects</th>
                <th>Type</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>Social Science</td>
                <td>AI & AS, Economics, Geography, History, Political Science, Psychology, Sociology</td>
                <td><span class="dept-badge">UG / PG</span></td>
              </tr>

              <tr>
                <td>2</td>
                <td>Humanities</td>
                <td>English, Hindi, Maithili, Pali, Philosophy, Sanskrit, Urdu</td>
                <td><span class="dept-badge">UG</span></td>
              </tr>

              <tr>
                <td>3</td>
                <td>Science</td>
                <td>Botany, Chemistry, Mathematics, Physics, Zoology</td>
                <td><span class="dept-badge">UG</span></td>
              </tr>

              <tr>
                <td>4</td>
                <td>Commerce</td>
                <td>Commerce, Accounts, Business Studies, Finance</td>
                <td><span class="dept-badge">UG / PG</span></td>
              </tr>

              <tr>
                <td>5</td>
                <td>Vocational</td>
                <td>B.C.A, B.B.M, A.S.P.M, B.Sc. (IT), T.T.M</td>
                <td><span class="dept-badge">Vocational</span></td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>

    </div>
  </section>
  <!-- DEPARTMENT TABLE END -->


  <!-- DEPARTMENT SUPPORT START -->
  <section class="dept-support-section">
    <div class="container">

      <div class="row g-4">

        <div class="col-lg-4 col-md-6">
          <div class="dept-support-card">
            <i class="bi bi-person-video3"></i>
            <h4>Faculty Profiles</h4>
            <p>Future-ready structure for faculty profile pages and department-wise teacher details.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="dept-support-card">
            <i class="bi bi-journal-check"></i>
            <h4>Course Guidance</h4>
            <p>Students can explore department-wise subjects, courses and academic options.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="dept-support-card">
            <i class="bi bi-building-check"></i>
            <h4>Academic Support</h4>
            <p>Departments support classroom learning, practical activities and academic development.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- DEPARTMENT SUPPORT END -->
@endsection