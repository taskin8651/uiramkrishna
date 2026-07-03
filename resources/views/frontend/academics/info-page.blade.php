@extends('frontend.master')

@section('content')

@php
    $title = $page->hero_title ?? 'Academic Information';

    $cards = ($page && !empty($page->cards)) ? $page->cards : [
        [
            'icon' => 'bi bi-info-circle-fill',
            'title' => 'Information',
            'description' => 'Content will be updated soon.',
        ],
    ];

    $tableRows = ($page && !empty($page->table_rows)) ? $page->table_rows : [];
@endphp

<section class="dept-hero-section">
    <div class="dept-hero-shape dept-hero-shape-1"></div>
    <div class="dept-hero-shape dept-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="dept-hero-content text-center">

            <span class="dept-kicker">
                <i class="bi bi-journal-check"></i>
                {{ $page->kicker_text ?? 'Academics' }}
            </span>

            <h1>{{ $title }}</h1>

            <p>
                {{ $page->hero_description ?? 'Academic information page of Ram Krishna Dwarika College, Patna.' }}
            </p>

            <nav class="dept-breadcrumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('frontend.departments') }}">Academics</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $title }}</span>
            </nav>

        </div>
    </div>
</section>


<section class="dept-support-section">
    <div class="container">

        <div class="section-title text-center">
            <span>
                <i class="bi bi-list-check"></i>
                {{ $page->section_label ?? 'Information' }}
            </span>

            <h2>{{ $page->section_title ?? $title }}</h2>

            <p>
                {{ $page->section_description ?? 'Details will be updated soon.' }}
            </p>
        </div>

        <div class="row g-4">
            @foreach($cards as $card)
                <div class="col-lg-4 col-md-6">
                    <div class="dept-support-card">
                        <i class="{{ data_get($card, 'icon', 'bi bi-info-circle-fill') }}"></i>
                        <h4>{{ data_get($card, 'title') }}</h4>
                        <p>{{ data_get($card, 'description') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@if(count($tableRows))
    <section class="dept-table-section">
        <div class="container">

            <div class="dept-table-card">

                <div class="dept-table-head">
                    <div>
                        <span class="dept-subtitle">
                            <i class="bi bi-table"></i>
                            Summary
                        </span>

                        <h2>{{ $title }} Details</h2>
                    </div>
                </div>

                <div class="dept-table-wrap">
                    <table class="dept-course-table">
                        <thead>
                            <tr>
                                <th>SL. No.</th>
                                <th>Title</th>
                                <th>Details</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tableRows as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ data_get($row, 'title') }}</td>
                                    <td>{{ data_get($row, 'details') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>
@endif

@endsection