@extends('layouts.frontend')
@section('title', 'Accountech || Home')
@push('styles')
    <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('front_assets/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endpush
@section('content')
    <!-- ========================
             HERO SECTION WITH AUTOMATIC SLIDER
        ========================= -->
    <section class="hero" aria-label="Hero section with financial solutions">

        <!-- Slider Container -->
        <div class="hero-slider">
            <div class="hero-slide active">
                <img src="{{ asset('front_assets/images/banner7.avif') }}" alt="Financial planning" class="hero-slide__bg">
            </div>
            <div class="hero-slide">
                <img src="{{ asset('front_assets/images/banner8.jpg') }}" alt="Accounting services" class="hero-slide__bg">
            </div>
            <div class="hero-slide">
                <img src="{{ asset('front_assets/images/banner9.jpg') }}" alt="Tax consultation" class="hero-slide__bg">
            </div>
        </div>

        <!-- Overlay -->
        <div class="hero__overlay"></div>

        <!-- Content -->
        <div class="hero__container">
            <div class="hero__content">
                <h1 class="hero__title">Unlock Your Financial Potential with Accountech</h1>
                <p class="hero__subtitle">Empowering Your Financial Journey with Expert Accounting Solutions</p>
            
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button class="slider-arrow prev" id="prevSlide"><i class="fas fa-chevron-left"></i></button>
        <button class="slider-arrow next" id="nextSlide"><i class="fas fa-chevron-right"></i></button>

        <!-- Dots -->
        <div class="slider-dots">
            <span class="dot active" data-slide="0"></span>
            <span class="dot" data-slide="1"></span>
            <span class="dot" data-slide="2"></span>
        </div>

    </section>


  

@endsection