@extends('frontend.master')

@section('content')

<section class="downloads-hero-section">
    <div class="downloads-hero-shape downloads-hero-shape-1"></div>
    <div class="downloads-hero-shape downloads-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="downloads-hero-content text-center">

            <span class="downloads-kicker">
                <i class="bi bi-download"></i>
                Academics
            </span>

            <h1>Downloads</h1>

            <p>
                Download admission forms, syllabus, examination notices, prospectus and academic documents.
            </p>

            <nav class="downloads-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Academics</a>
                <i class="bi bi-chevron-right"></i>
                <span>Downloads</span>
            </nav>

        </div>
    </div>
</section>


<section class="downloads-page-section">
    <div class="container">

        <div class="section-title text-center">
            <span>
                <i class="bi bi-folder-fill"></i>
                Official Documents
            </span>

            <h2>Academic Downloads</h2>

            <p>
                Access important files and documents published by the college.
            </p>
        </div>

        @if($categories->count())
            <div class="download-category-filter">
                <a href="#" class="active">All</a>

                @foreach($categories as $category)
                    <a href="#download-category-{{ $category->slug }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        @endif

        <div class="downloads-grid">

            @forelse($downloads as $download)
                <div class="download-card" id="download-category-{{ $download->category->slug ?? 'general' }}">

                    <div class="download-icon">
                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                    </div>

                    <div class="download-content">

                        <div class="download-meta">
                            <span>
                                <i class="bi bi-folder-fill"></i>
                                {{ $download->category->name ?? 'General' }}
                            </span>

                            @if($download->year)
                                <span>
                                    <i class="bi bi-calendar-event"></i>
                                    {{ $download->year }}
                                </span>
                            @endif

                            @if($download->is_featured)
                                <span>
                                    <i class="bi bi-star-fill"></i>
                                    Featured
                                </span>
                            @endif
                        </div>

                        <h4>{{ $download->title }}</h4>

                        @if($download->description)
                            <p>{{ $download->description }}</p>
                        @endif

                        <div class="download-actions">
                            @if($download->download_file_url)
                                <a href="{{ $download->download_file_url }}"
                                   target="_blank"
                                   class="btn btn-main">
                                    View / Download
                                    <i class="bi bi-download"></i>
                                </a>

                                @if($download->download_file_size)
                                    <span class="download-size">
                                        {{ $download->download_file_size }}
                                    </span>
                                @endif
                            @else
                                <span class="download-size">
                                    File will be updated soon.
                                </span>
                            @endif
                        </div>

                    </div>

                </div>
            @empty
                <div class="download-empty-card text-center">
                    <i class="bi bi-info-circle-fill"></i>
                    <h4>Downloads will be updated soon.</h4>
                    <p>No downloadable document is available right now.</p>
                </div>
            @endforelse

        </div>

    </div>
</section>

@endsection