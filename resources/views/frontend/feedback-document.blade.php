@extends('frontend.master')

@php
    $pageTitle = optional($document)->title ?: $defaults['title'];
    $documentTitle = optional($document)->title ?: $defaults['document_title'];
    $description = optional($document)->description ?: $defaults['description'];
    $fileUrl = optional($document)->file_url ?: $defaults['url'];
@endphp

@section('title', $pageTitle . ' | Ram Krishna Dwarika College, Patna')

@section('content')

<section class="fb-hero-section">
    <div class="fb-hero-shape fb-hero-shape-1"></div>
    <div class="fb-hero-shape fb-hero-shape-2"></div>

    <div class="container position-relative">
        <div class="fb-hero-content text-center">
            <span class="fb-kicker">
                <i class="{{ $defaults['icon'] }}"></i>
                Feedback
            </span>

            <h1>{{ $pageTitle }}</h1>

            <p>{{ $description }}</p>

            <nav class="fb-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $pageTitle }}</span>
            </nav>
        </div>
    </div>
</section>

<section class="fb-main-section">
    <div class="container position-relative">
        <div class="fb-card">
            <div class="fb-card-head">
                <div>
                    <span class="fb-subtitle">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                        Official PDF
                    </span>

                    <h2>{{ $documentTitle }}</h2>
                </div>

                <a href="{{ $fileUrl }}" target="_blank" class="btn btn-outline-main">
                    Open PDF <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>

            <div class="fb-info-grid">
                <div class="fb-info-box">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                    <h4>Document</h4>
                    <p>{{ $documentTitle }}</p>
                </div>

                <div class="fb-info-box">
                    <i class="bi bi-chat-square-text"></i>
                    <h4>Description</h4>
                    <p>{{ $description }}</p>
                </div>

                <div class="fb-info-box">
                    <i class="{{ $type === 'alumni' ? 'bi bi-bank2' : 'bi bi-shield-lock-fill' }}"></i>
                    <h4>{{ $type === 'alumni' ? 'Institution' : 'Confidential' }}</h4>
                    <p>{{ $defaults['confidential_text'] }}</p>
                </div>
            </div>

            <div class="fb-pdf-box">
                <iframe src="{{ $fileUrl }}" title="{{ $defaults['iframe_title'] }}"></iframe>
            </div>

            <div class="fb-actions">
                <a href="{{ $fileUrl }}" target="_blank" class="fb-download-btn">
                    <i class="bi bi-download"></i>
                    {{ $defaults['download_text'] }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
