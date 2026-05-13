@extends('layouts.frontend')
@section('title', 'Accountech || About Us')
@push('styles')
  <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('front_assets/js/index.js') }}"></script>
@endpush
@section('content')

  <!-- ========================
           ABOUT HEADER SECTION
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
      <h1 class="about-header__title">About Us</h1>
      <p class="about-header__subtitle">
        Learn more about Accountech and our commitment to excellence in financial services.
      </p>
    </div>
  </div>

  <!-- ========================
           ABOUT US SECTION
      ========================= -->
  <section class="about-us" aria-label="About Accountech">
    <div class="about-us__container">
      <!-- LEFT COLUMN (Title + Subtitle) -->
      <div class="left-about">
        <h4 class="about-us__badge">About Accountech</h4>
        <h2 class="about-us__title">Welcome to Accountech</h2>
      </div>

    
      <!-- RIGHT COLUMN (Description + Button) -->
      <div class="right-about">
        <p class="about-us__description">
          At Accountech, we are dedicated to providing top-notch accounting and financial services to help individuals and
          businesses achieve their financial goals. With a team of experienced professionals, we offer a wide range of
          services including bookkeeping, tax preparation, financial planning, and consulting. Our mission is to empower
          our clients with the knowledge and tools they need to make informed financial decisions and succeed in today's
          competitive market. We pride ourselves on our commitment to excellence, integrity, and personalized service.The
          team consists of distinguished Chartered Accountants, Corporate Financial Advisors and Tax Consultants. The firm
          represents a combination of specialized skills, which are geared to offers sound financial advice and
          personalized proactive services. Those associated with the firm have regular interaction with industry and other
          professionals which enables the firm to keep pace with contemporary developments and to meet the needs of its
          clients.
        </p>
<div class="signature-line">
    <i class="fas fa-quote-left" style="color: rgb(19, 137, 201);"></i>
    <span class="signature-text">Trusted by thousands since 2015</span>
    <i class="fas fa-quote-right" style="color: rgb(19, 137, 201);"></i>
</div>
      </div>
      

      <!-- BOTTOM CARDS SECTION -->
      <div class="bottom-image">
        <div class="aboutcards">
          <!-- Card 1 -->
          <div class="card" data-card="1">
            <div class="card__image-wrapper">
              <img src="{{ asset('front_assets/images/Whats-New-img.jpg') }}" alt="What's New" class="card__image">
              <div class="card__overlay">
                <span class="card__badge">Latest</span>
              </div>
            </div>
            <div class="card__content">
              <div class="card__icon">
                <i class="fas fa-newspaper"></i>
              </div>
              <h3 class="card__title">WHAT'S NEW</h3>
              <p class="card__description">Stay updated with the latest news, features, and announcements from Accountech.
              </p>
              <div class="card__footer">
                <a href="{{ route('about.detail', 1) }}" class="card__btn">
                  <span>Read More</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card" data-card="2">
            <div class="card__image-wrapper">
              <img src="{{ asset('front_assets/images/Event-Calendar-img.jpg') }}" alt="Event Calendar"
                class="card__image">
              <div class="card__overlay">
                <span class="card__badge">Upcoming</span>
              </div>
            </div>
            <div class="card__content">
              <div class="card__icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <h3 class="card__title">EVENT CALENDAR</h3>
              <p class="card__description">Join our webinars, workshops, and training sessions to enhance your skills.</p>
              <div class="card__footer">
                <a href="{{ route('about.detail', 2) }}" class="card__btn">
                  <span>Read More</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="card" data-card="3">
            <div class="card__image-wrapper">
              <img src="{{ asset('front_assets/images/Career-img.jpg') }}" alt="Career" class="card__image">
              <div class="card__overlay">
                <span class="card__badge">Hiring</span>
              </div>
            </div>
            <div class="card__content">
              <div class="card__icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <h3 class="card__title">CAREER</h3>
              <p class="card__description">Join our team and grow your career with exciting opportunities at Accountech.
              </p>
              <div class="card__footer">
                <a href="{{ route('about.detail', 3) }}" class="card__btn">
                  <span>Read More</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
          <p class="service-description">Accurate and efficient audit services to ensure compliance and maintain financial
            integrity.</p>
          <a href="{{ route('service.detail', 1) }}" class="service-link">Learn More →</a>
        </div>

        <!-- Card 2 -->
        <div class="service-card">
          <div class="service-icon-wrapper">
            <i class="fas fa-file-invoice-dollar service-icon"></i>
          </div>
          <h3 class="service-card-title">Income Tax Preparation</h3>
          <p class="service-description">Expert tax preparation services to ensure compliance and maximize your tax
            savings.</p>
          <a href="{{ route('service.detail', 2) }} " class="service-link">Learn More →</a>
        </div>

        <!-- Card 3 -->
        <div class="service-card">
          <div class="service-icon-wrapper">
            <i class="fas fa-chart-line service-icon"></i>
          </div>
          <h3 class="service-card-title">Financial Planning</h3>
          <p class="service-description">Comprehensive financial planning services to help you achieve your long-term
            financial goals.</p>
          <a href="{{ route('service.detail', 3) }}" class="service-link">Learn More →</a>
        </div>

        <!-- Card 4 -->
        <div class="service-card">
          <div class="service-icon-wrapper">
            <i class="fas fa-handshake service-icon"></i>
          </div>
          <h3 class="service-card-title">Business Consulting</h3>
          <p class="service-description">Professional consulting services to provide strategic financial advice and
            solutions for your business.</p>
          <a href="{{ route('service.detail', 4) }}" class="service-link">Learn More →</a>
        </div>

        <!-- Card 5 -->
        <div class="service-card">
          <div class="service-icon-wrapper">
            <i class="fas fa-percentage service-icon"></i>
          </div>
          <h3 class="service-card-title">GST Services</h3>
          <p class="service-description">Comprehensive GST services to support your business operations and financial
            management.</p>
          <a href="{{ route('service.detail', 5) }}" class="service-link">Learn More →</a>
        </div>

        <!-- Card 6 -->
        <div class="service-card">
          <div class="service-icon-wrapper">
            <i class="fas fa-building service-icon"></i>
          </div>
          <h3 class="service-card-title">Company Registration</h3>
          <p class="service-description">Comprehensive company registration services to support your business operations
            and financial management.</p>
          <a href="{{ route('service.detail', 6) }}" class="service-link">Learn More →</a>
        </div>
      </div>
    </div>
  </section>
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