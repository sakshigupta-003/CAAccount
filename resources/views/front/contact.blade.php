@extends('layouts.frontend')
@section('title', 'Accountech || Contact Us')
@push('styles')
  <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('front_assets/js/index.js') }}"></script>
@endpush
@section('content')

  <!-- ========================
             Contact HEADER SECTION
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
      <h1 class="about-header__title">Contact Us</h1>
      <p class="about-header__subtitle">
        Get in touch with us for any inquiries or assistance.
      </p>
    </div>
  </div>
  <!-- ========================
         CONTACT SECTION (Professional)
    ========================= -->
  <section class="contact-section" aria-label="Contact Us">
    <div class="contact-container-main">
      <!-- Section Header -->
      <div class="contact-header">
        <h4 class="contact-badge">Reach Us</h4>
        <h2 class="contact-title-main">Contact Information</h2>
        <p class="contact-subtitle">We'd love to hear from you! Get in touch with our expert team.</p>
      </div>

      <!-- Two Columns: Contact Info + Form -->
      <div class="contact-wrapper">
        <!-- Left: Contact Info Cards -->
        <div class="contact-info">
          <!-- Address Card -->
          <div class="info-card">
            <div class="info-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3>Office Address</h3>
            <p>
              <a href="https://maps.google.com/?q=1125-26+i-thum+towers+b+Noida" target="_blank" class="contact-link">
                1125-26 i-thum towers-b , pilot No-A40,<br> Sector-62, Noida, Uttar Pradesh 201301
              </a>
            </p>
          </div>

          <!-- Phone Card -->
          <div class="info-card">
            <div class="info-icon">
              <i class="fas fa-phone-alt"></i>
            </div>
            <h3>Phone</h3>
            <p>
              <a href="tel:+919217354577" class="contact-link">+91 9217354577</a><br>
              <a href="tel:+919876543210" class="contact-link">+91 9876543210</a>
            </p>
          </div>

          <!-- Email Card -->
          <div class="info-card">
            <div class="info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <h3>Email</h3>
            <p>
              <a href="mailto:info@accountech.com" class="contact-link">info@accountech.com</a><br>
              <a href="mailto:support@accountech.com" class="contact-link">support@accountech.com</a>
            </p>
          </div>

          <!-- Hours Card -->
          <div class="info-card">
            <div class="info-icon">
              <i class="fas fa-clock"></i>
            </div>
            <h3>Working Hours</h3>
            <p>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 2:00 PM</p>
          </div>
        </div>

        <!-- Right: Contact Form -->
        <div class="contact-form-wrapper">
          <div class="form-header">
            <h2 class="form-title">Get In Touch</h2>
            <p class="form-description">Have questions or want to learn more? Reach out to us!</p>
          </div>
          <form class="contact-form" action="#" method="POST">
            <div class="form-row">
              <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Full Name *</label>
                <input type="text" id="name" name="name" placeholder="John Doe" required>
              </div>
              <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email Address *</label>
                <input type="email" id="email" name="email" placeholder="john@example.com" required>
              </div>
            </div>
            <div class="form-group">
              <label for="phone"><i class="fas fa-phone"></i> Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="+91 98765 43210">
            </div>
            <div class="form-group">
              <label for="message"><i class="fas fa-comment"></i> Message *</label>
              <textarea id="message" name="message" rows="1" placeholder="Your message here..." required></textarea>
            </div>
            <button type="submit" class="submit-btn">
              <span>Send Message</span>
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
    

@endsection