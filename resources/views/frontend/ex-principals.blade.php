
@extends('frontend.master')
@section('content')


  <!-- EX PRINCIPALS HERO START -->
  <section class="ex-principal-hero">
    <div class="ex-hero-shape ex-hero-shape-1"></div>
    <div class="ex-hero-shape ex-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="ex-hero-content text-center">

        <span class="ex-kicker">
          <i class="bi bi-people-fill"></i>
          About College
        </span>

        <h1>Our Ex Principals</h1>

        <p>
          A respectful record of former Principals and Incharge Principals who
          contributed to the academic journey of Ram Krishna Dwarika College, Patna.
        </p>

        <nav class="ex-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <a href="about.html">About Us</a>
          <i class="bi bi-chevron-right"></i>
          <span>Our Ex Principals</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- EX PRINCIPALS HERO END -->


  <!-- EX PRINCIPALS LIST START -->
  <section class="ex-principals-section">
    <div class="ex-bg-shape ex-bg-shape-1"></div>
    <div class="ex-bg-shape ex-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="row g-4 align-items-stretch">

        <!-- LEFT SUMMARY -->
        <div class="col-lg-4">
          <div class="ex-summary-card h-100">

            <div class="ex-summary-icon">
              <i class="bi bi-person-badge-fill"></i>
            </div>

            <span>Institutional Leadership</span>

            <h2>Leadership Timeline</h2>

            <p>
              This section presents the official list of Principals and Incharge
              Principals of RKD College from 1975 to the present leadership period.
            </p>

            <div class="ex-summary-stats">
              <div>
                <strong>1975</strong>
                <small>First Listed Period</small>
              </div>

              <div>
                <strong>29</strong>
                <small>Total Records</small>
              </div>

              <div>
                <strong>2025</strong>
                <small>Current Update</small>
              </div>
            </div>

            <div class="ex-current-principal">
              <i class="bi bi-award-fill"></i>
              <div>
                <strong>Current Principal</strong>
                <span>Prof. (Dr.) Shekhar Kumar Jaiswal</span>
              </div>
            </div>

          </div>
        </div>

        <!-- RIGHT TABLE -->
        <div class="col-lg-8">
          <div class="ex-table-card h-100">

            <div class="ex-table-head">
              <div>
                <span class="ex-subtitle">
                  <i class="bi bi-list-check"></i>
                  Official Record
                </span>
                <h2>Former Principals List</h2>
              </div>

              <a href="principal-message.html" class="btn btn-main">
                Principal Message
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <div class="ex-table-wrap">
             <table class="ex-principal-table">
    <thead>
        <tr>
            <th>Sl. No.</th>
            <th>Name</th>
            <th>Post</th>
            <th>Period</th>
        </tr>
    </thead>

    <tbody>
        @forelse($exPrincipals as $item)
            <tr class="{{ $item->is_current ? 'current-row' : '' }}">
                <td>{{ $item->sort_order }}</td>

                <td>{{ $item->name }}</td>

                <td>
                    <span class="post-badge {{ $item->badge_class }}">
                        {{ $item->post_label }}
                    </span>
                </td>

                <td>{{ $item->period }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align:center;">
                    Principal records will be updated soon.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- EX PRINCIPALS LIST END -->


  <!-- EX PRINCIPALS NOTE START -->
  <section class="ex-note-section">
    <div class="container">
      <div class="ex-note-card">

        <div class="ex-note-icon">
          <i class="bi bi-info-circle-fill"></i>
        </div>

        <div>
          <span>Official Note</span>
          <h2>Leadership record of RKD College</h2>
          <p>
            This list is prepared as static frontend content based on the official
            ex-principals record of Ram Krishna Dwarika College, Patna.
          </p>
        </div>

        <a href="about.html" class="btn btn-main">
          About College
          <i class="bi bi-arrow-right"></i>
        </a>

      </div>
    </div>
  </section>
  <!-- EX PRINCIPALS NOTE END -->


  @endsection