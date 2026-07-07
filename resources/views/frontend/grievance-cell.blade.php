

@extends('frontend.master')
  @section('title', 'Grievance Cell')


  <!-- GRIEVANCE HERO START -->
  <section class="grv-hero-section">
    <div class="grv-hero-shape grv-hero-shape-1"></div>
    <div class="grv-hero-shape grv-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="grv-hero-content text-center">

        <span class="grv-kicker">
          <i class="bi bi-chat-square-text-fill"></i>
          Student Support
        </span>

        <h1>Grievance Cell</h1>

        <p>
          Student grievance support and official contact links of Ram Krishna Dwarika College, Patna.
        </p>

        <nav class="grv-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <span>Grievance Cell</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- GRIEVANCE HERO END -->


  <!-- GRIEVANCE MAIN START -->
  <section class="grv-main-section">
    <div class="grv-bg-shape grv-bg-shape-1"></div>
    <div class="grv-bg-shape grv-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="grv-card">

        <div class="grv-card-head">
          <div>
            <span class="grv-subtitle">
              <i class="bi bi-shield-check"></i>
              Official Information
            </span>

            <h2>Student Grievance Cell</h2>
          </div>

          <a href="https://rkdcollegepatna.org/ContactUs.aspx" target="_blank" class="btn btn-outline-main">
            Contact Page
            <i class="bi bi-box-arrow-up-right"></i>
          </a>
        </div>

        <div class="grv-info-grid">

          <div class="grv-info-box">
            <i class="bi bi-chat-dots-fill"></i>
            <h4>Student Grievance Cell</h4>
            <p>Students can approach the grievance cell for redressal of their issues.</p>
          </div>

          <div class="grv-info-box">
            <i class="bi bi-person-lines-fill"></i>
            <h4>Enquiry / Feedback</h4>
            <p>Contact page includes enquiry / feedback form for student communication.</p>
          </div>

          <div class="grv-info-box">
            <i class="bi bi-telephone-fill"></i>
            <h4>College Contact</h4>
            <p>Ram Krishna Dwarika College, Lohia Nagar, Kankarbagh, Patna-800020.</p>
          </div>

        </div>

        <div class="grv-link-grid">

          <a href="https://rkdcollegepatna.org/ContactUs.aspx" target="_blank" class="grv-link-item">
            <span class="grv-link-icon">
              <i class="bi bi-envelope-paper-fill"></i>
            </span>

            <div>
              <h4>Enquiry / Feedback Form</h4>
              <p>Official contact page for enquiry and feedback.</p>
            </div>

            <em>Open</em>
          </a>

          <a href="https://rkdcollegepatna.org/2025/BRCOGN19616.pdf" target="_blank" class="grv-link-item">
            <span class="grv-link-icon">
              <i class="bi bi-file-earmark-pdf-fill"></i>
            </span>

            <div>
              <h4>Student Grievance Cell Reference</h4>
              <p>Official SSR document reference.</p>
            </div>

            <em>View</em>
          </a>

        </div>

      </div>

    </div>
  </section>
  <!-- GRIEVANCE MAIN END -->
@endsection