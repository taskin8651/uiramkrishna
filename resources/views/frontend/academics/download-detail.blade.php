@extends('frontend.master')

@section('content')

@php
    $download = $download ?? null;
    $title = data_get($download, 'hero_title') ?? data_get($download, 'title') ?? ucwords(str_replace('-', ' ', $slug));

    $summaryItems = ($download && !empty($download->summary_items)) ? $download->summary_items : [
        ['label' => 'Document Type', 'value' => data_get($download, 'category.name') ?? 'Official Document'],
        ['label' => 'Reference Year', 'value' => data_get($download, 'year') ?? date('Y')],
        ['label' => 'Authority', 'value' => data_get($download, 'authority') ?? 'Ram Krishna Dwarika College'],
    ];

    $infoCards = ($download && !empty($download->info_cards)) ? $download->info_cards : [
        [
            'icon' => 'bi bi-bank2',
            'title' => 'Issuing Authority',
            'description' => data_get($download, 'authority') ?? 'Ram Krishna Dwarika College, Patna',
        ],
        [
            'icon' => 'bi bi-calendar-check-fill',
            'title' => 'Document Date',
            'description' => data_get($download, 'document_date') ?? 'Will be updated soon',
        ],
        [
            'icon' => 'bi bi-mortarboard-fill',
            'title' => 'Session Reference',
            'description' => data_get($download, 'session_reference') ?? 'Academic session reference',
        ],
        [
            'icon' => 'bi bi-file-earmark-pdf-fill',
            'title' => 'Document Type',
            'description' => data_get($download, 'category.name') ?? 'Official Document',
        ],
    ];

    $tableRows = ($download && !empty($download->table_rows)) ? $download->table_rows : [
        [
            'title' => $title,
            'details' => data_get($download, 'description') ?? 'Official document uploaded on RKD College website.',
            'button' => 'Download PDF',
        ],
    ];

    $fileUrl = data_get($download, 'final_download_url');
@endphp

<section class="acal-hero-section">
    <div class="acal-hero-shape acal-hero-shape-1"></div>
    <div class="acal-hero-shape acal-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="acal-hero-content text-center">

            <span class="acal-kicker">
                <i class="bi bi-calendar2-week-fill"></i>
                {{ data_get($download, 'kicker_text') ?? 'Downloads' }}
            </span>

            <h1>{{ $title }}</h1>

            <p>
                {{ data_get($download, 'hero_description') ?? data_get($download, 'description') ?? 'Official academic document for students and visitors.' }}
            </p>

            <nav class="acal-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('frontend.downloads') }}">Downloads</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $title }}</span>
            </nav>

        </div>
    </div>
</section>


<section class="acal-main-section">
    <div class="acal-bg-shape acal-bg-shape-1"></div>
    <div class="acal-bg-shape acal-bg-shape-2"></div>

    <div class="container position-relative">

        <div class="row g-4 align-items-stretch">

            <div class="col-lg-4">
                <div class="acal-summary-card h-100">

                    <div class="acal-summary-icon">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                    </div>

                    <span>Official Document</span>

                    <h2>{{ data_get($download, 'document_code') ?? data_get($download, 'title') ?? $title }}</h2>

                    <p>
                        {{ data_get($download, 'description') ?? 'Official document uploaded under downloads section.' }}
                    </p>

                    <div class="acal-summary-list">
                        @foreach($summaryItems as $item)
                            <div>
                                <strong>{{ data_get($item, 'label') }}</strong>
                                <small>{{ data_get($item, 'value') }}</small>
                            </div>
                        @endforeach
                    </div>

                    @if($fileUrl)
                        <a href="{{ $fileUrl }}" target="_blank" class="btn btn-main w-100">
                            View / Download PDF
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    @else
                        <button type="button" class="btn btn-main w-100" disabled>
                            File will be updated soon
                        </button>
                    @endif

                </div>
            </div>

            <div class="col-lg-8">
                <div class="acal-panel-card h-100">

                    <div class="acal-panel-head">
                        <div>
                            <span class="acal-subtitle">
                                <i class="bi bi-info-circle-fill"></i>
                                Document Information
                            </span>

                            <h2>{{ $title }} Details</h2>
                        </div>

                        <a href="{{ route('frontend.downloads') }}" class="btn btn-outline-main">
                            All Downloads
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="acal-info-grid">
                        @foreach($infoCards as $card)
                            <div class="acal-info-card">
                                <div class="acal-info-icon">
                                    <i class="{{ data_get($card, 'icon', 'bi bi-info-circle-fill') }}"></i>
                                </div>

                                <h4>{{ data_get($card, 'title') }}</h4>
                                <p>{{ data_get($card, 'description') }}</p>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>


<section class="acal-table-section">
    <div class="container">

        <div class="acal-table-card">

            <div class="acal-table-head">
                <div>
                    <span class="acal-subtitle">
                        <i class="bi bi-table"></i>
                        Document Record
                    </span>

                    <h2>{{ $title }} Summary</h2>
                </div>
            </div>

            <div class="acal-table-wrap">
                <table class="acal-data-table">
                    <thead>
                        <tr>
                            <th>SL. No.</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Document</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tableRows as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ data_get($row, 'title') }}</td>
                                <td>{{ data_get($row, 'details') }}</td>
                                <td>
                                    @if($fileUrl)
                                        <a href="{{ $fileUrl }}" target="_blank">
                                            {{ data_get($row, 'button', 'Download PDF') }}
                                            <i class="bi bi-download"></i>
                                        </a>
                                    @else
                                        <span>File not available</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>

@endsection
