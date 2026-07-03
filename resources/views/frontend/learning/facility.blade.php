@extends('frontend.master')

@section('content')

@php
    $slug = $slug ?? optional($facility)->slug ?? 'physics-lab';

    $prefixMap = [
        'computer-room' => 'comp',
        'e-library' => 'elib',
        'library' => 'library',
        'ict-training-center' => 'ict',
        'physics-lab' => 'phy',
        'psychology-lab' => 'psy',
        'geography-lab' => 'geo',
        'bsc-it-lab' => 'bsit',
        'bca-lab' => 'bca',
        'zoology-lab' => 'zoo',
        'botany-lab' => 'botany',
        'chemistry-lab' => 'chem',
    ];

    $prefix = optional($facility)->css_prefix ?: ($prefixMap[$slug] ?? 'phy');

    $heroTitle = optional($facility)->hero_title ?: ucwords(str_replace('-', ' ', $slug));
    $heroKicker = optional($facility)->hero_kicker ?: 'Learning Facility';
    $heroIcon = optional($facility)->hero_icon ?: 'bi bi-flask';
    $heroDescription = optional($facility)->hero_description ?: 'Learning facility information of Ram Krishna Dwarika College, Patna.';

    $mainImage = optional($facility)->main_image_url ?: data_get(optional($facility)->gallery_items, '0.image_url');
    $mainImage = $mainImage ?: asset('assets/img/no-image.jpg');

    if (!str_starts_with($mainImage, 'http') && !str_starts_with($mainImage, '/')) {
        $mainImage = asset($mainImage);
    }

    $imageBadge = optional($facility)->image_badge ?: 'Official Facility';
    $imageAlt = optional($facility)->image_alt ?: $heroTitle;
    $imageTitle = optional($facility)->image_title ?: $heroTitle;
    $imageDescription = optional($facility)->image_description ?: 'Facility details will be updated soon.';

    $panelSubtitle = optional($facility)->panel_subtitle ?: 'Facility Overview';
    $panelTitle = optional($facility)->panel_title ?: $heroTitle . ' Overview';
    $leadDescription = optional($facility)->lead_description ?: 'Detailed information will be updated soon.';

    $buttonText = optional($facility)->button_text ?: 'Departments';
    $buttonUrl = optional($facility)->button_url ?: 'departments.html';
    $buttonExternal = optional($facility)->button_external ?? false;

    $features = optional($facility)->features ?: [];
    $galleryItems = optional($facility)->gallery_items ?: [];

    $galleryLabel = optional($facility)->gallery_label ?: $heroTitle . ' Gallery';
    $galleryTitle = optional($facility)->gallery_title ?: 'Official Images';
    $galleryDescription = optional($facility)->gallery_description ?: 'Images and related links will be updated soon.';

    $detailItems = optional($facility)->detail_items ?: [];
    $detailLabel = optional($facility)->detail_label ?: 'Facility Uses';
    $detailTitle = optional($facility)->detail_title ?: $heroTitle . ' Uses';
    $detailButtonText = optional($facility)->detail_button_text;
    $detailButtonUrl = optional($facility)->detail_button_url;

    $buttonHref = str_starts_with($buttonUrl, 'http') ? $buttonUrl : url($buttonUrl);
@endphp


{{-- HERO START --}}
<section class="{{ $prefix }}-hero-section">
    <div class="{{ $prefix }}-hero-shape {{ $prefix }}-hero-shape-1"></div>
    <div class="{{ $prefix }}-hero-shape {{ $prefix }}-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="{{ $prefix }}-hero-content text-center">

            <span class="{{ $prefix }}-kicker">
                <i class="{{ $heroIcon }}"></i>
                {{ $heroKicker }}
            </span>

            <h1>{{ $heroTitle }}</h1>

            <p>{{ $heroDescription }}</p>

            <nav class="{{ $prefix }}-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Learning Facilities</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $heroTitle }}</span>
            </nav>

        </div>
    </div>
</section>
{{-- HERO END --}}


{{-- MAIN START --}}
<section class="{{ $prefix }}-main-section">
    <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-1"></div>
    <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-5">
                <div class="{{ $prefix }}-image-card h-100">

                    <div class="{{ $prefix }}-main-image">
                        <img src="{{ $mainImage }}" alt="{{ $imageAlt }}">
                    </div>

                    <div class="{{ $prefix }}-image-info">
                        <span>
                            <i class="bi bi-images"></i>
                            {{ $imageBadge }}
                        </span>

                        <h2>{{ $imageTitle }}</h2>

                        <p>{{ $imageDescription }}</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-7">
                <div class="{{ $prefix }}-panel-card h-100">

                    <div class="{{ $prefix }}-panel-head">
                        <div>
                            <span class="{{ $prefix }}-subtitle">
                                <i class="bi bi-info-circle-fill"></i>
                                {{ $panelSubtitle }}
                            </span>

                            <h2>{{ $panelTitle }}</h2>
                        </div>

                        <a href="{{ $buttonHref }}"
                           class="btn btn-outline-main"
                           @if($buttonExternal) target="_blank" @endif>
                            {{ $buttonText }}

                            @if($buttonExternal)
                                <i class="bi bi-box-arrow-up-right"></i>
                            @else
                                <i class="bi bi-arrow-right"></i>
                            @endif
                        </a>
                    </div>

                    <p class="{{ $prefix }}-lead">
                        {{ $leadDescription }}
                    </p>

                    @if(count($features))
                        <div class="{{ $prefix }}-feature-grid">

                            @foreach($features as $feature)
                                <div class="{{ $prefix }}-feature-card">
                                    <i class="{{ data_get($feature, 'icon', 'bi bi-patch-check-fill') }}"></i>

                                    <h4>{{ data_get($feature, 'title') }}</h4>

                                    <p>{{ data_get($feature, 'description') }}</p>
                                </div>
                            @endforeach

                        </div>
                    @endif

                </div>
            </div>

        </div>

    </div>
</section>
{{-- MAIN END --}}


{{-- GALLERY START --}}
@if(count($galleryItems))
    <section class="{{ $prefix }}-gallery-section">
        <div class="container">

            <div class="{{ $prefix }}-gallery-head text-center">
                <span class="{{ $prefix }}-subtitle">
                    <i class="bi bi-images"></i>
                    {{ $galleryLabel }}
                </span>

                <h2>{{ $galleryTitle }}</h2>

                <p>{{ $galleryDescription }}</p>
            </div>

            <div class="{{ $prefix }}-gallery-grid">

                @foreach($galleryItems as $item)
                    @php
                        $type = data_get($item, 'type', 'image');
                        $sizeClass = data_get($item, 'size_class');
                    @endphp

                    @if($type === 'link')
                        @php
                            $linkUrl = data_get($item, 'link_url', '#');
                            $linkHref = str_starts_with($linkUrl, 'http') ? $linkUrl : url($linkUrl);
                        @endphp

                        <a href="{{ $linkHref }}"
                           class="{{ $prefix }}-gallery-card {{ $prefix }}-link-visual {{ $sizeClass }}">
                            <div>
                                <i class="{{ data_get($item, 'icon', 'bi bi-link-45deg') }}"></i>
                                <strong>{{ data_get($item, 'title') }}</strong>
                                <small>{{ data_get($item, 'subtitle') }}</small>
                            </div>
                        </a>
                    @else
                        @php
                            $galleryImage = data_get($item, 'image_url');

                            if ($galleryImage && !str_starts_with($galleryImage, 'http') && !str_starts_with($galleryImage, '/')) {
                                $galleryImage = asset($galleryImage);
                            }
                        @endphp

                        @if($galleryImage)
                            <a href="{{ $galleryImage }}"
                               target="_blank"
                               class="{{ $prefix }}-gallery-card {{ $sizeClass }}">
                                <img src="{{ $galleryImage }}" alt="{{ data_get($item, 'image_alt') }}">
                                <span>{{ data_get($item, 'title') }}</span>
                            </a>
                        @endif
                    @endif
                @endforeach

            </div>

        </div>
    </section>
@endif
{{-- GALLERY END --}}


{{-- DETAIL START --}}
@if(count($detailItems))
    <section class="{{ $prefix }}-detail-section">
        <div class="container">

            <div class="{{ $prefix }}-detail-card">

                <div class="{{ $prefix }}-detail-head">
                    <div>
                        <span class="{{ $prefix }}-subtitle">
                            <i class="bi bi-list-check"></i>
                            {{ $detailLabel }}
                        </span>

                        <h2>{{ $detailTitle }}</h2>
                    </div>

                    @if($detailButtonText && $detailButtonUrl)
                        @php
                            $detailHref = str_starts_with($detailButtonUrl, 'http') ? $detailButtonUrl : url($detailButtonUrl);
                        @endphp

                        <a href="{{ $detailHref }}" class="btn btn-outline-main">
                            {{ $detailButtonText }}
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    @endif
                </div>

                <div class="{{ $prefix }}-use-grid">

                    @foreach($detailItems as $index => $item)
                        <div class="{{ $prefix }}-use-card">
                            <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h4>{{ data_get($item, 'title') }}</h4>
                            <p>{{ data_get($item, 'description') }}</p>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    </section>
@endif
{{-- DETAIL END --}}

@endsection