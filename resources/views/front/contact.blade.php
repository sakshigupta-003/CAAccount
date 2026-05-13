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
    <!-- Right Side Popup Widget -->
    <div class="right-popup-widget">
        <!-- Floating Button -->
        <button class="popup-toggle-btn" id="popupToggleBtn">
            <i class="fas fa-headset"></i>
            <span class="pulse-dot"></span>
        </button>

        <!-- Popup Container -->
        <div class="right-popup-container" id="rightPopupContainer">
            <div class="popup-header">
                <div class="header-info">
                    <i class="fas fa-chart-line"></i>
                    <div>
                        <h3>Accountech Assistant</h3>
                        <p>Online • Ready to help</p>
                    </div>
                </div>
                <button class="close-popup" id="closeRightPopupBtn">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="popup-body">
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <button class="action-btn" data-action="support">
                        <i class="fas fa-headset"></i>
                        <span>Support</span>
                    </button>
                    <button class="action-btn" data-action="account">
                        <i class="fas fa-user-circle"></i>
                        <span>My Account</span>
                    </button>
                    <button class="action-btn" data-action="services">
                        <i class="fas fa-bag-shopping"></i>
                        <span>Services</span>
                    </button>
                    <button class="action-btn" data-action="courses">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Courses</span>
                    </button>
                </div>

                <!-- Content Area (Dynamic) -->
                <div class="popup-content-area" id="popupContentArea">
                    <!-- Default Content -->
                    <div class="content-default">
                        <div class="welcome-message">
                            <i class="fas fa-hand-wave"></i>
                            <h4>Welcome to Accountech!</h4>
                            <p>How can we assist you today?</p>
                        </div>

                        <div class="featured-tips">
                            <div class="tip-card">
                                <i class="fas fa-lightbulb"></i>
                                <div>
                                    <strong>Tax Saving Tip</strong>
                                    <p>Invest in Section 80C to save up to ₹46,800 in taxes.</p>
                                </div>
                            </div>
                            <div class="tip-card">
                                <i class="fas fa-chart-line"></i>
                                <div>
                                    <strong>Financial Planning</strong>
                                    <p>Start SIP with just ₹500 per month for long-term wealth.</p>
                                </div>
                            </div>
                            <div class="tip-card">
                                <i class="fas fa-file-invoice"></i>
                                <div>
                                    <strong>GST Filing Due</strong>
                                    <p>GSTR-3B due date: 20th of every month.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="popup-footer">
                <input type="text" placeholder="Type your question here..." id="chatInput">
                <button id="sendMessageBtn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

@endsection