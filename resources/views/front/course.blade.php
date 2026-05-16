@extends('layouts.frontend')
@section('title', 'Accountech || Courses')
@push('styles')
  <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('front_assets/js/index.js') }}"></script>
@endpush
@section('content')

  <!-- ========================
       Course HEADER SECTION
  ========================= -->
  <div class="about-header-wrapper">
    <!-- Background Image -->
    <img src="{{ asset('front_assets/images/banner7.avif') }}" alt="About Us Background" class="about-header-bg">

    <!-- Overlay (dark blue gradient) -->
    <div class="about-header-overlay"></div>

    <!-- Back Button (absolutely positioned top-left) -->
    <a href="{{ URL::to('/') }}" class="back-btn">
      <i class="fas fa-arrow-left"></i> Back
    </a>

    <!-- Centered Content -->
    <div class="about-header">
      <h1 class="about-header__title">Our Courses</h1>
      <p class="about-header__subtitle">
        Discover our comprehensive range of courses designed to enhance your financial knowledge and skills.
      </p>
    </div>
  </div>
 
@endsection