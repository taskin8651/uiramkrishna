@extends('frontend.master')
@section('content')


  <!-- UG HERO START -->
  <section class="ug-hero-section">
    <div class="ug-hero-shape ug-hero-shape-1"></div>
    <div class="ug-hero-shape ug-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="ug-hero-content text-center">

        <span class="ug-kicker">
          <i class="bi bi-mortarboard-fill"></i>
          Academics
        </span>

        <h1>Under Graduation Courses</h1>

        <p>
          Bachelor of Arts, Science and Commerce Honours courses under 4 Year
          Undergraduate Programme structure as per CBCS / UGC framework.
        </p>

        <nav class="ug-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <a href="courses.html">Academics</a>
          <i class="bi bi-chevron-right"></i>
          <span>Under Graduation Courses</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- UG HERO END -->


  <!-- UG COURSE OVERVIEW START -->
  <section class="ug-course-section">
    <div class="ug-bg-shape ug-bg-shape-1"></div>
    <div class="ug-bg-shape ug-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <!-- LEFT SUMMARY -->
        <div class="col-lg-4">
          <div class="ug-summary-card h-100">

            <div class="ug-summary-icon">
              <i class="bi bi-journal-richtext"></i>
            </div>

            <span>UG Course Overview</span>

            <h2>B.A / B.Sc / B.Com</h2>

            <p>
              Undergraduate courses at RKD College are offered through different
              faculties including Social Science, Science, Humanities and Commerce.
            </p>

            <div class="ug-summary-stats">
              <div>
                <strong>4</strong>
                <small>Faculties</small>
              </div>

              <div>
                <strong>19+</strong>
                <small>Subjects</small>
              </div>

              <div>
                <strong>4</strong>
                <small>Year UG</small>
              </div>
            </div>

            <div class="ug-info-note">
              <i class="bi bi-info-circle-fill"></i>
              <div>
                <strong>Course Structure</strong>
                <span>4 Year Bachelor of Arts / Science / Commerce Honours under CBCS system.</span>
              </div>
            </div>

          </div>
        </div>

        <!-- RIGHT MAIN PROGRAMS -->
        <div class="col-lg-8">
          <div class="ug-panel-card h-100">

            <div class="ug-panel-head">
              <div>
                <span class="ug-subtitle">
                  <i class="bi bi-list-check"></i>
                  Available UG Programmes
                </span>

                <h2>Undergraduate Programme Details</h2>
              </div>

              <a href="admission.html" class="btn btn-main">
                Admission Details
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <div class="ug-program-grid">

              <div class="ug-program-card">
                <div class="ug-program-icon">
                  <i class="bi bi-book-half"></i>
                </div>

                <span>Arts / Humanities</span>
                <h4>B.A. Honours</h4>
                <p>
                  Bachelor of Arts Honours programme with humanities and social science subjects.
                </p>

                <div class="ug-meta">
                  <div><i class="bi bi-clock"></i> 4 Years</div>
                  <div><i class="bi bi-person-check"></i> 12th Pass</div>
                </div>
              </div>

              <div class="ug-program-card">
                <div class="ug-program-icon">
                  <i class="bi bi-activity"></i>
                </div>

                <span>Science</span>
                <h4>B.Sc. Honours</h4>
                <p>
                  Bachelor of Science Honours programme with science subjects and lab learning.
                </p>

                <div class="ug-meta">
                  <div><i class="bi bi-clock"></i> 4 Years</div>
                  <div><i class="bi bi-person-check"></i> 12th Science</div>
                </div>
              </div>

              <div class="ug-program-card">
                <div class="ug-program-icon">
                  <i class="bi bi-graph-up-arrow"></i>
                </div>

                <span>Commerce</span>
                <h4>B.Com Honours</h4>
                <p>
                  Bachelor of Commerce Honours programme for accounts, business and finance studies.
                </p>

                <div class="ug-meta">
                  <div><i class="bi bi-clock"></i> 4 Years</div>
                  <div><i class="bi bi-person-check"></i> 12th Pass</div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- UG COURSE OVERVIEW END -->


  <!-- FACULTY SUBJECTS START -->
  <section class="ug-subject-section">
    <div class="container">

      <div class="section-title text-center ug-subject-title">
        <span>
          <i class="bi bi-columns-gap"></i>
          UG Subjects
        </span>

        <h2>Faculty Wise Subject Structure</h2>

        <p>
          Details of course / subject offered in various Undergraduate programmes.
        </p>
      </div>

      <div class="ug-subject-grid">

        <!-- SOCIAL SCIENCE -->
        <div class="ug-subject-card">
          <div class="ug-subject-head">
            <div class="ug-subject-icon">
              <i class="bi bi-people-fill"></i>
            </div>

            <div>
              <span>Faculty A</span>
              <h4>Social Science</h4>
            </div>
          </div>

          <div class="ug-chip-list">
            <span>AI & AS</span>
            <span>Economics</span>
            <span>Geography</span>
            <span>History</span>
            <span>Political Science</span>
            <span>Psychology</span>
            <span>Sociology</span>
          </div>
        </div>

        <!-- SCIENCE -->
        <div class="ug-subject-card">
          <div class="ug-subject-head">
            <div class="ug-subject-icon">
              <i class="bi bi-bezier2"></i>
            </div>

            <div>
              <span>Faculty B</span>
              <h4>Science</h4>
            </div>
          </div>

          <div class="ug-chip-list">
            <span>Botany</span>
            <span>Chemistry</span>
            <span>Mathematics</span>
            <span>Physics</span>
            <span>Zoology</span>
          </div>
        </div>

        <!-- HUMANITIES -->
        <div class="ug-subject-card">
          <div class="ug-subject-head">
            <div class="ug-subject-icon">
              <i class="bi bi-translate"></i>
            </div>

            <div>
              <span>Faculty C</span>
              <h4>Humanities</h4>
            </div>
          </div>

          <div class="ug-chip-list">
            <span>English</span>
            <span>Hindi</span>
            <span>Maithili</span>
            <span>Pali</span>
            <span>Philosophy</span>
            <span>Sanskrit</span>
            <span>Urdu</span>
          </div>
        </div>

        <!-- COMMERCE -->
        <div class="ug-subject-card">
          <div class="ug-subject-head">
            <div class="ug-subject-icon">
              <i class="bi bi-calculator-fill"></i>
            </div>

            <div>
              <span>Faculty D</span>
              <h4>Commerce</h4>
            </div>
          </div>

          <div class="ug-chip-list">
            <span>Accounts</span>
            <span>Commerce</span>
            <span>Business Studies</span>
            <span>Finance</span>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- FACULTY SUBJECTS END -->


  <!-- UG TABLE START -->
  <section class="ug-table-section">
    <div class="ug-table-shape ug-table-shape-1"></div>
    <div class="ug-table-shape ug-table-shape-2"></div>

    <div class="container position-relative">

      <div class="ug-table-card">

        <div class="ug-table-head">
          <div>
            <span class="ug-subtitle">
              <i class="bi bi-table"></i>
              Official UG Structure
            </span>

            <h2>Course, Faculty & Subject Details</h2>
          </div>

          <a href="downloads.html" class="btn btn-outline-main">
            Downloads
            <i class="bi bi-download"></i>
          </a>
        </div>

        <div class="ug-table-wrap">
          <table class="ug-course-table">
            <thead>
              <tr>
                <th>Programme</th>
                <th>Faculty</th>
                <th>Subjects</th>
                <th>Duration</th>
                <th>Mode</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>B.A. Honours</td>
                <td>Social Science</td>
                <td>AI & AS, Economics, Geography, History, Political Science, Psychology, Sociology</td>
                <td><span class="ug-course-badge">4 Years</span></td>
                <td>Regular</td>
              </tr>

              <tr>
                <td>B.Sc. Honours</td>
                <td>Science</td>
                <td>Botany, Chemistry, Mathematics, Physics, Zoology</td>
                <td><span class="ug-course-badge">4 Years</span></td>
                <td>Regular</td>
              </tr>

              <tr>
                <td>B.A. Honours</td>
                <td>Humanities</td>
                <td>English, Hindi, Maithili, Pali, Philosophy, Sanskrit, Urdu</td>
                <td><span class="ug-course-badge">4 Years</span></td>
                <td>Regular</td>
              </tr>

              <tr>
                <td>B.Com Honours</td>
                <td>Commerce</td>
                <td>Accounts</td>
                <td><span class="ug-course-badge">4 Years</span></td>
                <td>Regular</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>

    </div>
  </section>
  <!-- UG TABLE END -->


  <!-- UG HELP START -->
  <section class="ug-help-section">
    <div class="container">

      <div class="row g-4">

        <div class="col-lg-4 col-md-6">
          <div class="ug-help-card">
            <i class="bi bi-file-earmark-text-fill"></i>
            <h4>Admission Documents</h4>
            <p>Students should keep marksheet, photo, ID proof, migration/TC and other required documents ready.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="ug-help-card">
            <i class="bi bi-megaphone-fill"></i>
            <h4>Admission Notice</h4>
            <p>Admission updates, subject availability and university portal information should be checked regularly.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="ug-help-card">
            <i class="bi bi-journal-check"></i>
            <h4>Course Guidance</h4>
            <p>Students may contact college office for subject selection and admission related guidance.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- UG HELP END -->
   @endsection