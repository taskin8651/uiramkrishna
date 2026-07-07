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

        'ncc' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'NCC Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'nss' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'NSS Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'sports' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Sports Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'cultural' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Cultural Activities Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'icc' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'ICC Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'gender-sensitization' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Gender Sensitization Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'placement-cell' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Placement Cell Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'counselling-cell' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Counselling Cell Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'skill-development-entrepreneurship-cell' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Skill Development Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'departmental-activities' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Departmental Activities Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'webinar' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Webinar Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'workshop-activities' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'Workshop Activities Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],

        'college-events' => [
            'css_prefix' => 'aqar',
            'template_type' => 'grid',
            'subtitle_icon' => 'bi bi-file-earmark-pdf-fill',
            'subtitle_text' => 'Official PDFs',
            'card_title' => 'College Events Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
            'pdf_items' => [],
            'meta_items' => [],
            'preview_enabled' => false,
        ],
    ];

    $fallback = $fallbacks[$slug] ?? $fallbacks['aqar'];

    $prefix = $fallback['css_prefix'];
    $templateType = 'grid';

    $subtitleIcon = $fallback['subtitle_icon'];
    $subtitleText = $fallback['subtitle_text'];
    $cardTitle = optional($page)->card_title ?: $fallback['card_title'];

    $officialButtonText = $fallback['official_button_text'];
    $officialButtonUrl = $fallback['official_button_url'];

    $pdfItems = optional($page)->pdf_items ?: $fallback['pdf_items'];
    $mediaById = $page ? $page->getMedia('quality_documents')->keyBy('id') : collect();
    $metaItems = $fallback['meta_items'];

    $previewEnabled = count($pdfItems) > 0;

    $previewSubtitleIcon = data_get($fallback, 'preview_subtitle_icon', 'bi bi-eye-fill');
    $previewSubtitleText = data_get($fallback, 'preview_subtitle_text', 'PDF Preview');
    $firstPdfUrl = data_get($pdfItems, '0.url');
    if (! $firstPdfUrl && data_get($pdfItems, '0.media_id')) {
        $firstPdfUrl = optional($mediaById->get(data_get($pdfItems, '0.media_id')))->getUrl();
    }

    $previewPdfUrl = $firstPdfUrl ?: data_get($fallback, 'preview_pdf_url');
    $previewTitle = data_get($pdfItems, '0.title') ? data_get($pdfItems, '0.title') . ' Preview' : data_get($fallback, 'preview_title', $cardTitle . ' Preview');
    $previewButtonText = data_get($fallback, 'preview_button_text', 'Open PDF');
    $previewIframeTitle = 'RKD College ' . strtoupper($slug) . ' PDF';

    $downloadButtonText = data_get($fallback, 'download_button_text', 'View / Download PDF');

    $mainPdfUrl = $previewPdfUrl ?: data_get($pdfItems, '0.url');
    $officialHref = $officialButtonUrl && $officialButtonUrl !== '#' ? $officialButtonUrl : '#';
@endphp


@if($templateType === 'single_pdf')
    {{-- SINGLE PDF TEMPLATE START --}}
    <section class="aqar-main-section">
        <div class="aqar-bg-shape aqar-bg-shape-1"></div>
        <div class="aqar-bg-shape aqar-bg-shape-2"></div>

        <div class="container position-relative">

            <div class="aqar-pdf-card">

                <div class="aqar-pdf-head">
                    <div>
                        <span class="aqar-subtitle">
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
                    <div class="aqar-pdf-meta">
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
                    <div class="aqar-pdf-box">
                        <iframe src="{{ $mainPdfUrl }}" title="{{ $previewIframeTitle }}"></iframe>
                    </div>
                @endif

                @if($mainPdfUrl)
                    <div class="aqar-pdf-actions">
                        <a href="{{ $mainPdfUrl }}" target="_blank" class="aqar-download-btn">
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
    <section class="aqar-main-section">
        <div class="aqar-bg-shape aqar-bg-shape-1"></div>
        <div class="aqar-bg-shape aqar-bg-shape-2"></div>

        <div class="container position-relative">

            <div class="aqar-card">

                <div class="aqar-card-head">
                    <div>
                        <span class="aqar-subtitle">
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
                    <div class="aqar-pdf-grid">
                        @foreach($pdfItems as $item)
                            @php
                                $itemUrl = data_get($item, 'url');

                                if (! $itemUrl && data_get($item, 'media_id')) {
                                    $itemUrl = optional($mediaById->get(data_get($item, 'media_id')))->getUrl();
                                }
                            @endphp
                            <div class="aqar-pdf-item">
                                <div class="aqar-pdf-icon">
                                    <i class="{{ data_get($item, 'icon', 'bi bi-file-earmark-pdf-fill') }}"></i>
                                </div>

                                <div class="aqar-pdf-content">
                                    <h4>{{ data_get($item, 'title') }}</h4>
                                    <p>{{ data_get($item, 'description') }}</p>
                                </div>

                                @if($itemUrl)
                                    <a href="{{ $itemUrl }}"
                                       target="_blank"
                                       class="quality-preview-link"
                                       data-preview-url="{{ $itemUrl }}"
                                       data-preview-title="{{ data_get($item, 'title', $cardTitle) }} Preview">
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
        <section class="aqar-preview-section" id="qualityPdfPreview">
            <div class="container">

                <div class="aqar-preview-card">

                    <div class="aqar-preview-head">
                        <div>
                            <span class="aqar-subtitle">
                                <i class="{{ $previewSubtitleIcon }}"></i>
                                {{ $previewSubtitleText }}
                            </span>

                            <h2 data-preview-heading>{{ $previewTitle }}</h2>
                        </div>

                        <a href="{{ $previewPdfUrl }}" target="_blank" class="btn btn-outline-main" data-preview-open>
                            {{ $previewButtonText }}
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </div>

                    <div class="aqar-pdf-box">
                        <iframe src="{{ $previewPdfUrl }}" title="{{ $previewIframeTitle }}" data-preview-frame></iframe>
                    </div>

                </div>

            </div>
        </section>
        {{-- PREVIEW END --}}
    @endif
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var previewSection = document.getElementById('qualityPdfPreview');

        if (!previewSection) {
            return;
        }

        var frame = previewSection.querySelector('[data-preview-frame]');
        var heading = previewSection.querySelector('[data-preview-heading]');
        var openButton = previewSection.querySelector('[data-preview-open]');

        document.querySelectorAll('.quality-preview-link').forEach(function (link) {
            link.addEventListener('click', function (event) {
                var previewUrl = link.dataset.previewUrl;

                if (!previewUrl || !frame || !openButton) {
                    return;
                }

                event.preventDefault();

                frame.src = previewUrl;
                openButton.href = previewUrl;

                if (heading && link.dataset.previewTitle) {
                    heading.textContent = link.dataset.previewTitle;
                }

                previewSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    });
</script>


<!-- QUICK LINKS START -->
<section class="iqac-link-section">
    <div class="container">

        <div class="iqac-link-card">

            <div class="iqac-link-head">
                <div>
                    <span class="iqac-subtitle">
                        <i class="bi bi-grid-fill"></i>
                        Quick Links
                    </span>

                    <h2>Important Quick Links</h2>
                </div>
            </div>

            @php
                $quickLinks = [
                    [
                        'title' => 'NAAC & Accreditation',
                        'icon'  => 'bi bi-award-fill',
                        'url'   => url('/naac'),
                        'slug'  => 'naac',
                    ],
                    [
                        'title' => 'AQAR Reports',
                        'icon'  => 'bi bi-file-earmark-pdf-fill',
                        'url'   => url('/aqar'),
                        'slug'  => 'aqar',
                    ],
                    [
                        'title' => 'IQAC Documents',
                        'icon'  => 'bi bi-bank2',
                        'url'   => url('/iqac'),
                        'slug'  => 'iqac',
                    ],
                    [
                        'title' => 'ICT Documents',
                        'icon'  => 'bi bi-laptop-fill',
                        'url'   => url('/ict'),
                        'slug'  => 'ict',
                    ],
                    [
                        'title' => 'SSR',
                        'icon'  => 'bi bi-clipboard-check-fill',
                        'url'   => url('/ssr'),
                        'slug'  => 'ssr',
                    ],
                    [
                        'title' => 'NCC',
                        'icon'  => 'bi bi-award-fill',
                        'url'   => url('/ncc'),
                        'slug'  => 'ncc',
                    ],
                    [
                        'title' => 'NSS',
                        'icon'  => 'bi bi-people-fill',
                        'url'   => url('/nss'),
                        'slug'  => 'nss',
                    ],
                    [
                        'title' => 'Sports',
                        'icon'  => 'bi bi-trophy-fill',
                        'url'   => url('/sports'),
                        'slug'  => 'sports',
                    ],
                    [
                        'title' => 'Cultural Activities',
                        'icon'  => 'bi bi-music-note-beamed',
                        'url'   => url('/cultural'),
                        'slug'  => 'cultural',
                    ],
                    [
                        'title' => 'ICC',
                        'icon'  => 'bi bi-shield-check',
                        'url'   => url('/icc'),
                        'slug'  => 'icc',
                    ],
                    [
                        'title' => 'Gender Sensitization',
                        'icon'  => 'bi bi-gender-ambiguous',
                        'url'   => url('/gender-sensitization'),
                        'slug'  => 'gender-sensitization',
                    ],
                    [
                        'title' => 'Placement Cell',
                        'icon'  => 'bi bi-briefcase-fill',
                        'url'   => url('/placement-cell'),
                        'slug'  => 'placement-cell',
                    ],
                    [
                        'title' => 'Counselling Cell',
                        'icon'  => 'bi bi-chat-dots-fill',
                        'url'   => url('/counselling-cell'),
                        'slug'  => 'counselling-cell',
                    ],
                    [
                        'title' => 'Skill Development',
                        'icon'  => 'bi bi-lightbulb-fill',
                        'url'   => url('/skill-development-entrepreneurship-cell'),
                        'slug'  => 'skill-development-entrepreneurship-cell',
                    ],
                    [
                        'title' => 'Departmental Activities',
                        'icon'  => 'bi bi-calendar-check-fill',
                        'url'   => url('/departmental-activities'),
                        'slug'  => 'departmental-activities',
                    ],
                    [
                        'title' => 'Webinar',
                        'icon'  => 'bi bi-camera-video-fill',
                        'url'   => url('/webinar'),
                        'slug'  => 'webinar',
                    ],
                    [
                        'title' => 'Workshop Activities',
                        'icon'  => 'bi bi-tools',
                        'url'   => url('/workshop-activities'),
                        'slug'  => 'workshop-activities',
                    ],
                    [
                        'title' => 'College Events',
                        'icon'  => 'bi bi-images',
                        'url'   => url('/college-events'),
                        'slug'  => 'college-events',
                    ],
                    [
                        'title' => 'Departments',
                        'icon'  => 'bi bi-diagram-3-fill',
                        'url'   => url('/departments'),
                        'slug'  => 'departments',
                    ],
                    [
                        'title' => 'Student Zone',
                        'icon'  => 'bi bi-person-lines-fill',
                        'url'   => route('frontend.downloads'),
                        'slug'  => 'student-zone',
                    ],
                    [
                        'title' => 'Exam & Results',
                        'icon'  => 'bi bi-file-earmark-check-fill',
                        'url'   => url('/#examination'),
                        'slug'  => 'examination',
                    ],
                    [
                        'title' => 'Alumni',
                        'icon'  => 'bi bi-people-fill',
                        'url'   => url('/alumni'),
                        'slug'  => 'alumni',
                    ],
                    
                ];
            @endphp

            <div class="iqac-link-grid">
                @foreach($quickLinks as $link)
                    <a href="{{ $link['url'] }}"
                       class="{{ ($slug ?? '') === $link['slug'] ? 'active' : '' }}">
                        <i class="{{ $link['icon'] }}"></i>
                        {{ $link['title'] }}
                    </a>
                @endforeach
            </div>

        </div>

    </div>
</section>
<!-- QUICK LINKS END -->


<!-- IMPORTANT LINKS START -->
<section class="iqac-link-section">
  <div class="container">

    <div class="iqac-link-card">

      <div class="iqac-link-head">
        <div>
          <span class="iqac-subtitle">
            <i class="bi bi-link-45deg"></i>
            Important Links
          </span>

          <h2>Important Links</h2>
        </div>
      </div>

      <div class="iqac-link-grid">
        <a href="https://www.ppup.ac.in/" target="_blank"><i class="bi bi-bank2"></i>Patliputra University</a>
        <a href="https://rti.gov.in/" target="_blank"><i class="bi bi-file-lock2-fill"></i>RTI</a>
        <a href="https://www.ugc.ac.in/" target="_blank"><i class="bi bi-mortarboard-fill"></i>UGC</a>
        <a href="https://www.aicte-india.org/" target="_blank"><i class="bi bi-patch-check-fill"></i>AICTE</a>
        <a href="https://www.naac.gov.in/" target="_blank"><i class="bi bi-award-fill"></i>NAAC</a>
        <a href="https://www.india.gov.in/" target="_blank"><i class="bi bi-globe-central-south-asia"></i>National Portal of India</a>
      </div>

    </div>

  </div>
</section>
<!-- IMPORTANT LINKS END -->
@endsection
