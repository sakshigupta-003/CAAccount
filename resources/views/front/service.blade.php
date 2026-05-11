@extends('layouts.frontend')
@section('title','Accountech || Services')
@push('styles')
<link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('front_assets/js/index.js') }}"></script>
@endpush
@section('content')

<!-- ========================
     service HEADER SECTION
========================= -->
<div class="about-header-wrapper">
  <!-- Background Image -->
  <img 
    src="{{ asset('front_assets/images/banner7.avif') }}" 
    alt="About Us Background" 
    class="about-header-bg"
  >
  
  <!-- Overlay (dark blue gradient) -->
  <div class="about-header-overlay"></div>
  
  <!-- Back Button (absolutely positioned top-left) -->
  <a href="{{ URL::to('/') }}" class="back-btn">
    <i class="fas fa-arrow-left"></i> Back
  </a>
  
  <!-- Centered Content -->
  <div class="about-header">
    <h1 class="about-header__title">Our Services</h1>
    <p class="about-header__subtitle">
      Explore our comprehensive range of financial services designed to meet your needs
    </p>
  </div>
</div>

<br>
<!-- ========================
     OUR SERVICES SECTION (Overlay Background Image in HTML)
========================= -->
<section class="services-section" aria-label="Our Services">
  <!-- Background Image (added directly in HTML) -->
  <img class="services-bg" src="front_assets/images/service.jpg" alt="Financial services background">

  <div class="services-container">
    <!-- Section Header -->
    <div class="services-header">
      <h4 class="services-badge">Our Services</h4>
      <h2 class="services-title">Comprehensive Financial Solutions</h2>
      <p class="services-subtitle">Expert services tailored to meet your financial needs</p>
    </div>

    <!-- Services Grid (6 cards) -->
    <div class="services-grid">
      <!-- Card 1 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-search service-icon"></i>
        </div>
        <h3 class="service-card-title">Audit Services</h3>
        <p class="service-description">Accurate and efficient audit services to ensure compliance and maintain financial integrity.</p>
        <a href="#" class="service-link">Learn More →</a>
      </div>

      <!-- Card 2 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-file-invoice-dollar service-icon"></i>
        </div>
        <h3 class="service-card-title">Income Tax Preparation</h3>
        <p class="service-description">Expert tax preparation services to ensure compliance and maximize your tax savings.</p>
        <a href="#" class="service-link">Learn More →</a>
      </div>

      <!-- Card 3 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-chart-line service-icon"></i>
        </div>
        <h3 class="service-card-title">Financial Planning</h3>
        <p class="service-description">Comprehensive financial planning services to help you achieve your long-term financial goals.</p>
        <a href="#" class="service-link">Learn More →</a>
      </div>

      <!-- Card 4 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-handshake service-icon"></i>
        </div>
        <h3 class="service-card-title">Business Consulting</h3>
        <p class="service-description">Professional consulting services to provide strategic financial advice and solutions for your business.</p>
        <a href="#" class="service-link">Learn More →</a>
      </div>

      <!-- Card 5 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-percentage service-icon"></i>
        </div>
        <h3 class="service-card-title">GST Services</h3>
        <p class="service-description">Comprehensive GST services to support your business operations and financial management.</p>
        <a href="#" class="service-link">Learn More →</a>
      </div>

      <!-- Card 6 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-building service-icon"></i>
        </div>
        <h3 class="service-card-title">Company Registration</h3>
        <p class="service-description">Comprehensive company registration services to support your business operations and financial management.</p>
        <a href="#" class="service-link">Learn More →</a>
      </div>
    </div>
  </div>
</section>
@endsection