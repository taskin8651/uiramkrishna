@extends('frontend.master')

@section('content')

@php
    $fallbacks = [
        'aqar' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'AQAR Reports',
            'official_button_text' => 'Official Page',
            'official_button_url' => 'https://rkdcollegepatna.org/AQAR.aspx',
            'pdf_items' => [
                [
                    'title' => 'AQAR 2021-22',
                    'description' => 'YEARLY STATUS REPORT - 2021-2022',
                    'url' => 'https://rkdcollegepatna.org/Downloads/AQAR_2021-22.pdf',
                    'button_text' => 'View PDF',
                    'icon' => 'bi bi-file-earmark-pdf-fill',
                ],
            ],
            'preview_enabled' => true,
            'preview_subtitle_icon' => 'bi bi-eye-fill',
            'preview_subtitle_text' => 'PDF Preview',
            'preview_title' => 'AQAR 2021-22 Preview',
            'preview_button_text' => 'Open PDF',
            'preview_pdf_url' => 'https://rkdcollegepatna.org/Downloads/AQAR_2021-22.pdf',
            'preview_iframe_title' => 'RKD College AQAR PDF',
            'download_button_text' => 'View / Download PDF',
            'meta_items' => [],
        ],

        'naac' => [
            'css_prefix' => 'naacn',
            'template_type' => 'single_pdf',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDF',
            'card_title' => 'NAAC Notice 2024',
            'official_button_text' => 'Open PDF',
            'official_button_url' => 'https://rkdcollegepatna.org/Downloads/Naac_2024.pdf',
            'pdf_items' => [
                [
                    'title' => 'NAAC Notice 2024',
                    'description' => 'Official NAAC document',
                    'url' => 'https://rkdcollegepatna.org/Downloads/Naac_2024.pdf',
                    'button_text' => 'View PDF',
                    'icon' => 'bi bi-file-earmark-pdf-fill',
                ],
            ],
            'meta_items' => [
                [
                    'icon' => 'bi bi-file-earmark-pdf-fill',
                    'label' => 'Document',
                    'value' => 'Naac_2024.pdf',
                ],
                [
                    'icon' => 'bi bi-files',
                    'label' => 'Pages',
                    'value' => '34 Pages',
                ],
                [
                    'icon' => 'bi bi-bank2',
                    'label' => 'College',
                    'value' => 'Ram Krishna Dwarika College',
                ],
            ],
            'preview_enabled' => true,
            'preview_pdf_url' => 'https://rkdcollegepatna.org/Downloads/Naac_2024.pdf',
            'preview_iframe_title' => 'RKD College NAAC Notice PDF',
            'download_button_text' => 'View / Download NAAC PDF',
        ],

        'iqac' => [
            'css_prefix' => 'iqac',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'IQAC Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'ict' => [
            'css_prefix' => 'ictdoc',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'ICT Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'ssr' => [
            'css_prefix' => 'ssr',
            'template_type' => 'single_pdf',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDF',
            'card_title' => 'SSR Report',
            'official_button_text' => 'Open PDF',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
            'download_button_text' => 'View / Download SSR PDF',
        ],
    ];

    $fallback = $fallbacks[$slug] ?? $fallbacks['aqar'];

    $prefix = optional($page)->css_prefix ?: $fallback['css_prefix'];
    $templateType = optional($page)->template_type ?: $fallback['template_type'];

    $subtitleIcon = optional($page)->subtitle_icon ?: $fallback['subtitle_icon'];
    $subtitleText = optional($page)->subtitle_text ?: $fallback['subtitle_text'];
    $cardTitle = optional($page)->card_title ?: $fallback['card_title'];

    $officialButtonText = optional($page)->official_button_text ?: $fallback['official_button_text'];
    $officialButtonUrl = optional($page)->official_button_url ?: $fallback['official_button_url'];

    $pdfItems = optional($page)->pdf_items ?: $fallback['pdf_items'];
    $metaItems = optional($page)->meta_items ?: $fallback['meta_items'];

    $previewEnabled = optional($page)->preview_enabled ?? $fallback['preview_enabled'];

    $previewSubtitleIcon = optional($page)->preview_subtitle_icon ?: data_get($fallback, 'preview_subtitle_icon', 'bi bi-eye-fill');
    $previewSubtitleText = optional($page)->preview_subtitle_text ?: data_get($fallback, 'preview_subtitle_text', 'PDF Preview');
    $previewTitle = optional($page)->preview_title ?: data_get($fallback, 'preview_title', $cardTitle . ' Preview');
    $previewButtonText = optional($page)->preview_button_text ?: data_get($fallback, 'preview_button_text', 'Open PDF');
    $previewPdfUrl = optional($page)->preview_pdf_url ?: data_get($fallback, 'preview_pdf_url');
    $previewIframeTitle = optional($page)->preview_iframe_title ?: data_get($fallback, 'preview_iframe_title', $cardTitle . ' PDF');

    $downloadButtonText = optional($page)->download_button_text ?: data_get($fallback, 'download_button_text', 'View / Download PDF');

    $mainPdfUrl = $previewPdfUrl ?: data_get($pdfItems, '0.url');
    $officialHref = $officialButtonUrl && $officialButtonUrl !== '#' ? $officialButtonUrl : '#';
@endphp


@if($templateType === 'single_pdf')
    {{-- SINGLE PDF TEMPLATE START --}}
    <section class="{{ $prefix }}-main-section">
        <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-1"></div>
        <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-2"></div>

        <div class="container position-relative">

            <div class="{{ $prefix }}-pdf-card">

                <div class="{{ $prefix }}-pdf-head">
                    <div>
                        <span class="{{ $prefix }}-subtitle">
                            <i class="{{ $subtitleIcon }}"></i>
                            {{ $subtitleText }}
                        </span>

                        <h2>{{ $cardTitle }}</h2>
                    </div>

                    @if($officialHref && $officialHref !== '#')
                        <a href="{{ $officialHref }}" target="_blank" class="btn btn-outline-main">
                            {{ $officialButtonText }}
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    @endif
                </div>

                @if(count($metaItems))
                    <div class="{{ $prefix }}-pdf-meta">
                        @foreach($metaItems as $meta)
                            <div>
                                <i class="{{ data_get($meta, 'icon', 'bi bi-file-earmark-text-fill') }}"></i>
                                <strong>{{ data_get($meta, 'label') }}</strong>
                                <span>{{ data_get($meta, 'value') }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($previewEnabled && $mainPdfUrl)
                    <div class="{{ $prefix }}-pdf-box">
                        <iframe src="{{ $mainPdfUrl }}" title="{{ $previewIframeTitle }}"></iframe>
                    </div>
                @endif

                @if($mainPdfUrl)
                    <div class="{{ $prefix }}-pdf-actions">
                        <a href="{{ $mainPdfUrl }}" target="_blank" class="{{ $prefix }}-download-btn">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                            {{ $downloadButtonText }}
                        </a>
                    </div>
                @endif

            </div>

        </div>
    </section>
    {{-- SINGLE PDF TEMPLATE END --}}
@else
    {{-- GRID TEMPLATE START --}}
    <section class="{{ $prefix }}-main-section">
        <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-1"></div>
        <div class="{{ $prefix }}-bg-shape {{ $prefix }}-bg-shape-2"></div>

        <div class="container position-relative">

            <div class="{{ $prefix }}-card">

                <div class="{{ $prefix }}-card-head">
                    <div>
                        <span class="{{ $prefix }}-subtitle">
                            <i class="{{ $subtitleIcon }}"></i>
                            {{ $subtitleText }}
                        </span>

                        <h2>{{ $cardTitle }}</h2>
                    </div>

                    @if($officialHref && $officialHref !== '#')
                        <a href="{{ $officialHref }}" target="_blank" class="btn btn-outline-main">
                            {{ $officialButtonText }}
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    @endif
                </div>

                @if(count($pdfItems))
                    <div class="{{ $prefix }}-pdf-grid">
                        @foreach($pdfItems as $item)
                            <div class="{{ $prefix }}-pdf-item">
                                <div class="{{ $prefix }}-pdf-icon">
                                    <i class="{{ data_get($item, 'icon', 'bi bi-file-earmark-pdf-fill') }}"></i>
                                </div>

                                <div class="{{ $prefix }}-pdf-content">
                                    <h4>{{ data_get($item, 'title') }}</h4>
                                    <p>{{ data_get($item, 'description') }}</p>
                                </div>

                                @if(data_get($item, 'url'))
                                    <a href="{{ data_get($item, 'url') }}" target="_blank">
                                        {{ data_get($item, 'button_text', 'View PDF') }}
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="margin:0;color:#64748b;">Documents will be updated soon.</p>
                @endif

            </div>

        </div>
    </section>
    {{-- GRID TEMPLATE END --}}

    @if($previewEnabled && $previewPdfUrl)
        {{-- PREVIEW START --}}
        <section class="{{ $prefix }}-preview-section">
            <div class="container">

                <div class="{{ $prefix }}-preview-card">

                    <div class="{{ $prefix }}-preview-head">
                        <div>
                            <span class="{{ $prefix }}-subtitle">
                                <i class="{{ $previewSubtitleIcon }}"></i>
                                {{ $previewSubtitleText }}
                            </span>

                            <h2>{{ $previewTitle }}</h2>
                        </div>

                        <a href="{{ $previewPdfUrl }}" target="_blank" class="btn btn-outline-main">
                            {{ $previewButtonText }}
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </div>

                    <div class="{{ $prefix }}-pdf-box">
                        <iframe src="{{ $previewPdfUrl }}" title="{{ $previewIframeTitle }}"></iframe>
                    </div>

                </div>

            </div>
        </section>
        {{-- PREVIEW END --}}
    @endif
@endif

@endsection