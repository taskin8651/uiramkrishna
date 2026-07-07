@extends('frontend.master')
@section('content')

  <!-- CONTACT HERO START -->
  <section class="contact-hero-section">
    <div class="contact-hero-shape contact-hero-shape-1"></div>
    <div class="contact-hero-shape contact-hero-shape-2"></div>

    <div class="container position-relative">
      <div class="contact-hero-content text-center">

        <span class="contact-kicker">
          <i class="bi bi-telephone-fill"></i>
          Contact Us
        </span>

        <h1>Contact Us</h1>

        <p>
          Official contact details and enquiry / feedback form of Ram Krishna Dwarika College, Patna.
        </p>

        <nav class="contact-breadcrumb" aria-label="breadcrumb">
          <a href="index.html">Home</a>
          <i class="bi bi-chevron-right"></i>
          <span>Contact Us</span>
        </nav>

      </div>
    </div>
  </section>
  <!-- CONTACT HERO END -->


  <!-- CONTACT MAIN START -->
  <section class="contact-main-section">
    <div class="contact-bg-shape contact-bg-shape-1"></div>
    <div class="contact-bg-shape contact-bg-shape-2"></div>

    <div class="container position-relative">

      <div class="contact-card">

        <div class="contact-card-head">
          <div>
            <span class="contact-subtitle">
              <i class="bi bi-geo-alt-fill"></i>
              Official Details
            </span>

            <h2>Ram Krishna Dwarika College</h2>
          </div>

          <a href="https://rkdcollegepatna.org/ContactUs.aspx" target="_blank" class="btn btn-outline-main">
            Official Page
            <i class="bi bi-box-arrow-up-right"></i>
          </a>
        </div>

        <div class="contact-info-grid">

          <div class="contact-info-box">
            <i class="bi bi-geo-alt-fill"></i>
            <h4>Address</h4>
            <p>Ram Krishna Dwarika College, Lohia Nagar, Kankarbagh, Patna-800 020</p>
          </div>

          <div class="contact-info-box">
            <i class="bi bi-telephone-fill"></i>
            <h4>Phone</h4>
            <p>0612-2382713</p>
          </div>

          <div class="contact-info-box">
            <i class="bi bi-envelope-fill"></i>
            <h4>Email</h4>
            <p>rkdconline@gmail.com</p>
          </div>

          <div class="contact-info-box">
            <i class="bi bi-mortarboard-fill"></i>
            <h4>PG Department Enquiry</h4>
            <p>06122382071</p>
          </div>

          <div class="contact-info-box">
            <i class="bi bi-journal-check"></i>
            <h4>Admission / Examination Enquiry</h4>
            <p>06122382067 / 06122382064</p>
          </div>

          <div class="contact-info-box">
            <i class="bi bi-chat-square-text-fill"></i>
            <h4>Enquiry / Feedback</h4>
            <p>Use the official enquiry / feedback form fields below.</p>
          </div>

        </div>

      </div>

      <div class="contact-form-card">

    <div class="contact-form-head">
        <span class="contact-subtitle">
            <i class="bi bi-envelope-paper-fill"></i>
            Enquiry / Feedback Form
        </span>

        <h2>Send Your Query</h2>
    </div>

    @if(session('message'))
        <div class="alert alert-success" style="margin-bottom:18px;">
            {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" style="margin-bottom:18px;">
            Please check the form fields and try again.
        </div>
    @endif

    <form class="contact-form"
          action="{{ route('frontend.contact-enquiry.store') }}"
          method="post">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label>Name :</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Enter your name"
                       class="{{ $errors->has('name') ? 'is-invalid' : '' }}">

                @if($errors->has('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                @endif
            </div>

            <div class="col-md-6">
                <label>Email :</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Enter your email"
                       class="{{ $errors->has('email') ? 'is-invalid' : '' }}">

                @if($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>

            <div class="col-md-6">
                <label>Contact No. :</label>
                <input type="text"
                       name="phone"
                       value="{{ old('phone') }}"
                       placeholder="Enter contact number"
                       class="{{ $errors->has('phone') ? 'is-invalid' : '' }}">

                @if($errors->has('phone'))
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                @endif
            </div>

            <div class="col-md-6">
                <label>Subject :</label>
                <input type="text"
                       name="subject"
                       value="{{ old('subject') }}"
                       placeholder="Enter subject"
                       class="{{ $errors->has('subject') ? 'is-invalid' : '' }}">

                @if($errors->has('subject'))
                    <small class="text-danger">{{ $errors->first('subject') }}</small>
                @endif
            </div>

            <div class="col-12">
                <label>Message / Query :</label>
                <textarea name="message"
                          rows="5"
                          placeholder="Write your message or query"
                          class="{{ $errors->has('message') ? 'is-invalid' : '' }}">{{ old('message') }}</textarea>

                @if($errors->has('message'))
                    <small class="text-danger">{{ $errors->first('message') }}</small>
                @endif
            </div>

            <div class="col-12">
                <button type="submit" class="contact-submit-btn">
                    <i class="bi bi-send-fill"></i>
                    Submit Query
                </button>
            </div>

        </div>

    </form>

</div>

    </div>
  </section>
  <!-- CONTACT MAIN END -->

@endsection