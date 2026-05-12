@extends('layouts.frontend')
@section('title','Accountech || Home')
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
    <!-- Slide 1 -->
    <div class="hero-slide active">
      <img src="{{ asset('front_assets/images/banner7.avif') }}" alt="Financial planning" class="hero__bg">
    </div>
    <!-- Slide 2 -->
    <div class="hero-slide">
      <img src="{{ asset('front_assets/images/banner8.jpg') }}" alt="Accounting services" class="hero__bg">
    </div>
    <!-- Slide 3 -->
    <div class="hero-slide">
      <img src="{{ asset('front_assets/images/banner9.jpg') }}" alt="Tax consultation" class="hero__bg">
    </div>
  </div>

  <!-- Overlay (same for all slides) -->
  <div class="hero__overlay" aria-hidden="true"></div>
  
  <!-- Content (same for all slides) -->
  <div class="hero__container">
    <div class="hero__content">
      <h1 class="hero__title">Unlock Your Financial Potential with Accountech</h1>
      <p class="hero__subtitle">Empowering Your Financial Journey with Expert Accounting Solutions</p>
      <a href="#" class="hero__btn" aria-label="Get started with Accountech">Get Started</a>
    </div>
  </div>

  <!-- Navigation Arrows -->
  <button class="slider-arrow prev" id="prevSlide">
    <i class="fas fa-chevron-left"></i>
  </button>
  <button class="slider-arrow next" id="nextSlide">
    <i class="fas fa-chevron-right"></i>
  </button>

  <!-- Dots/Indicators -->
  <div class="slider-dots">
    <span class="dot active" data-slide="0"></span>
    <span class="dot" data-slide="1"></span>
    <span class="dot" data-slide="2"></span>
  </div>

  <!-- Dashboard Button -->
  <button class="open-dashboard-btn" id="openDashboardBtn">
    <i class="fas fa-chart-line"></i> Open Financial Dashboard
  </button>

  <!-- Dashboard Popup -->
  <div class="dashboard-popup" id="dashboardPopup">
    <div class="popup-header">
      <div>
        <h2><i class="fas fa-chart-pie"></i> Financial Dashboard</h2>
        <p>Real-time insights</p>
      </div>
      <button class="close-dashboard" id="closeDashboardBtn">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="dashboard-content">
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-label">Businesses of</div>
          <div class="stat-value">1,247 <span class="stat-unit">+</span></div>
          <div class="stat-trend"><i class="fas fa-arrow-up"></i> +12% this month</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Revenue Growth</div>
          <div class="stat-value">+127<span class="stat-unit">%</span></div>
          <div class="stat-trend"><i class="fas fa-chart-line"></i> Year over Year</div>
        </div>
      </div>
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-label">Time Saved</div>
          <div class="stat-value">80<span class="stat-unit"> hrs</span></div>
          <div class="stat-trend"><i class="fas fa-clock"></i> Monthly average</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Active Clients</div>
          <div class="stat-value">892</div>
          <div class="stat-trend"><i class="fas fa-users"></i> +23 this week</div>
        </div>
      </div>
      <div class="chart-container">
        <div class="chart-title">
          <i class="fas fa-chart-column" style="color: rgb(19, 137, 201);"></i> 
          Revenue Performance (Last 6 Months)
        </div>
        <canvas id="revenueChart" width="400" height="180"></canvas>
      </div>
      <div class="chart-container">
        <div class="chart-title">
          <i class="fas fa-chart-line" style="color: rgb(19, 137, 201);"></i> 
          Time Saved Trend
        </div>
        <canvas id="timeSavedChart" width="400" height="180"></canvas>
      </div>
      <div class="security-badge">
        <i class="fas fa-shield-alt"></i>
        <div>
          <h4>Secure Bank-Level Encryption</h4>
          <p>Your financial data is protected with 256-bit SSL encryption</p>
        </div>
        <i class="fas fa-lock" style="margin-left: auto; font-size: 1.5rem; color: #10b981;"></i>
      </div>
    </div>
  </div>
</section>

<!-- Chat Popup Widget -->
<div class="chat-widget">
  <button class="chat-toggle-btn" id="chatToggleBtn">
    <i class="fas fa-comment-dots"></i>
    <span class="unread-badge" id="unreadBadge" style="display: none;">0</span>
  </button>

  <div class="popup-container" id="popupContainer">
    <div class="popup-header">
      <h3><i class="fas fa-headset"></i> Support Chat</h3>
      <button class="close-popup" id="closePopupBtn"><i class="fas fa-times"></i></button>
    </div>
    <div class="messages-area" id="messagesArea">
      <!-- Message 1: Incoming from Mart's Malt Shop (unread) -->
      <div class="popupcard incoming unread" data-msg-id="1">
        <div class="message-sender">
          <span class="avatar-icon"><i class="fas fa-store"></i></span>
          Mart's Malt Shop
        </div>
        <div class="message-bubble">
          Can you provide an update on my tax return?
        </div>
        <div class="timestamp">Just now</div>
      </div>

      <!-- Message 2: Outgoing reply from Steve (read by default - we sent it) -->
      <div class="popupcard outgoing" data-msg-id="2">
        <div class="message-sender">
          <span class="avatar-icon"><i class="fas fa-user-check"></i></span>
          Steve@1-54Accountech
        </div>
        <div class="message-bubble">
          Yes, it's ready for your review!
        </div>
        <div class="timestamp">Now</div>
      </div>

      <!-- Message 3: New incoming from another client (unread) -->
      <div class="popupcard incoming unread" data-msg-id="3">
        <div class="message-sender">
          <span class="avatar-icon"><i class="fas fa-user"></i></span>
          Emily Chen
        </div>
        <div class="message-bubble">
          I have a question about the financial planning services you offer.
        </div>
        <div class="timestamp">2 min ago</div>
      </div>

      <!-- Message 4: Outgoing auto-reply (read) -->
      <div class="popupcard outgoing" data-msg-id="4">
        <div class="message-sender">
          <span class="avatar-icon"><i class="fas fa-headset"></i></span>
          Support Agent
        </div>
        <div class="message-bubble">
          Sure! We offer comprehensive financial planning that includes retirement, investments, and tax optimization. How can I assist further?
        </div>
        <div class="timestamp">Just now</div>
      </div>
    </div>
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
        At Accountech, we are dedicated to providing top-notch accounting and financial services to help individuals and businesses achieve their financial goals. With a team of experienced professionals, we offer a wide range of services including bookkeeping, tax preparation, financial planning, and consulting. Our mission is to empower our clients with the knowledge and tools they need to make informed financial decisions and succeed in today's competitive market. We pride ourselves on our commitment to excellence, integrity, and personalized service.The team consists of distinguished Chartered Accountants, Corporate Financial Advisors and Tax Consultants. The firm represents a combination of specialized skills, which are geared to offers sound financial advice and personalized proactive services. Those associated with the firm have regular interaction with industry and other professionals which enables the firm to keep pace with contemporary developments and to meet the needs of its clients.
      </p>
      
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
            <div class="card__content">                <div class="card__icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3 class="card__title">WHAT'S NEW</h3>
                <p class="card__description">Stay updated with the latest news, features, and announcements from Accountech.</p>
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
                <img src="{{ asset('front_assets/images/Event-Calendar-img.jpg') }}" alt="Event Calendar" class="card__image">
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
                <p class="card__description">Join our team and grow your career with exciting opportunities at Accountech.</p>
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
     OUR COURSES SECTION
========================= -->
<section class="courses-section" aria-label="Our Courses">
  <div class="courses-container">
    <!-- Section Header (centered) -->
    <div class="courses-header">
      <h4 class="courses-badge">Our Courses</h4>
      <h2 class="courses-title">Expand Your Knowledge</h2>
      <p class="courses-subtitle">Professional training programs designed to boost your career</p>
    </div>

    <!-- Courses Grid -->
    <div class="courses-grid">
      <!-- Course Card 1 -->
      <div class="course-card">
        <div class="course-image-wrapper">
          <img src="{{ asset('front_assets/images/tally.png') }}" alt="Tally Prime Course" class="course-image">
          <div class="course-overlay">
            <span class="course-price">$199</span>
          </div>
        </div>
        <div class="course-content">
          <h3 class="course-title">Tally Prime</h3>
          <p class="course-description">Learn the fundamentals of Tally Prime accounting software, from basic entries to advanced reporting.</p>
          <div class="course-meta">
            <span><i class="fas fa-clock"></i> 6 weeks</span>
            <span><i class="fas fa-users"></i> Beginner</span>
          </div>
          <a href="{{ route('course.detail', 1) }}" class="course-btn">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Course Card 2 -->
      <div class="course-card">
        <div class="course-image-wrapper">
          <img src="{{ asset('front_assets/images/gst.jpg') }}" alt="GST Training Course" class="course-image">
          <div class="course-overlay">
            <span class="course-price">$249</span>
          </div>
        </div>
        <div class="course-content">
          <h3 class="course-title">GST Training</h3>
          <p class="course-description">Master GST compliance, return filing, input tax credit, and latest updates in Indian taxation.</p>
          <div class="course-meta">
            <span><i class="fas fa-clock"></i> 8 weeks</span>
            <span><i class="fas fa-users"></i> Intermediate</span>
          </div>
          <a href="{{ route('course.detail', 2) }}" class="course-btn">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Course Card 3 -->
      <div class="course-card">
        <div class="course-image-wrapper">
          <img src="{{ asset('front_assets/images/advanced.jpg') }}" alt="Advanced Excel Course" class="course-image">
          <div class="course-overlay">
            <span class="course-price">$149</span>
          </div>
        </div>
        <div class="course-content">
          <h3 class="course-title">Advanced Excel</h3>
          <p class="course-description">Enhance your professional skills with pivot tables, macros, and data visualization techniques.</p>
          <div class="course-meta">
            <span><i class="fas fa-clock"></i> 5 weeks</span>
            <span><i class="fas fa-users"></i> Beginner to Advanced</span>
          </div>
          <a href="{{ route('course.detail', 3) }}" class="course-btn">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Course Card 4 -->
      <div class="course-card">
        <div class="course-image-wrapper">
          <img src="{{ asset('front_assets/images/acocunt.jpg') }}" alt="Accounting Training" class="course-image">
          <div class="course-overlay">
            <span class="course-price">$299</span>
          </div>
        </div>
        <div class="course-content">
          <h3 class="course-title">Accounting Training</h3>
          <p class="course-description">Master the art of accounting, financial statements, ledgers, and real-world bookkeeping.</p>
          <div class="course-meta">
            <span><i class="fas fa-clock"></i> 10 weeks</span>
            <span><i class="fas fa-users"></i> All Levels</span>
          </div>
          <a href="{{ route('course.detail', 4) }}" class="course-btn">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Course Card 5 -->
      <div class="course-card">
        <div class="course-image-wrapper">
          <img src="{{ asset('front_assets/images/tax.jpg') }}" alt="Taxation Course" class="course-image">
          <div class="course-overlay">
            <span class="course-price">$279</span>
          </div>
        </div>
        <div class="course-content">
          <h3 class="course-title">Taxation Course</h3>
          <p class="course-description">Learn income tax, corporate tax, TDS, and tax planning strategies for individuals and businesses.</p>
          <div class="course-meta">
            <span><i class="fas fa-clock"></i> 9 weeks</span>
            <span><i class="fas fa-users"></i> Intermediate</span>
          </div>
          <a href="{{ route('course.detail', 5) }}" class="course-btn">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
       <!-- Course Card 6 -->
      <div class="course-card">
        <div class="course-image-wrapper">
          <img src="{{ asset('front_assets/images/cost.jpg') }}" alt="Cost Accounting" class="course-image">
          <div class="course-overlay">
            <span class="course-price">$249</span>
          </div>
        </div>
        <div class="course-content">
          <h3 class="course-title"> Cost Accounting</h3>
          <p class="course-description">Understand cost allocation, variance analysis, and management accounting principles for effective financial decision-making.</p>
          <div class="course-meta">
            <span><i class="fas fa-clock"></i> 8 weeks</span>
            <span><i class="fas fa-users"></i> Intermediate</span>
          </div>
          <a href="{{ route('course.detail', 6) }}" class="course-btn">Learn More <i class="fas fa-arrow-right"></i></a>
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
        <p class="service-description">Accurate and efficient audit services to ensure compliance and maintain financial integrity.</p>
        <a href="{{ route('service.detail', 1) }}" class="service-link">Learn More →</a>
      </div>

      <!-- Card 2 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-file-invoice-dollar service-icon"></i>
        </div>
        <h3 class="service-card-title">Income Tax Preparation</h3>
        <p class="service-description">Expert tax preparation services to ensure compliance and maximize your tax savings.</p>
        <a href="{{ route('service.detail', 2) }}" class="service-link">Learn More →</a>
      </div>

      <!-- Card 3 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-chart-line service-icon"></i>
        </div>
        <h3 class="service-card-title">Financial Planning</h3>
        <p class="service-description">Comprehensive financial planning services to help you achieve your long-term financial goals.</p>
        <a href="{{ route('service.detail', 3) }}" class="service-link">Learn More →</a>
      </div>

      <!-- Card 4 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-handshake service-icon"></i>
        </div>
        <h3 class="service-card-title">Business Consulting</h3>
        <p class="service-description">Professional consulting services to provide strategic financial advice and solutions for your business.</p>
        <a href="{{ route('service.detail', 4) }}" class="service-link">Learn More →</a>
      </div>

      <!-- Card 5 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-percentage service-icon"></i>
        </div>
        <h3 class="service-card-title">GST Services</h3>
        <p class="service-description">Comprehensive GST services to support your business operations and financial management.</p>
        <a href="{{ route('service.detail', 5) }}" class="service-link">Learn More →</a>
      </div>

      <!-- Card 6 -->
      <div class="service-card">
        <div class="service-icon-wrapper">
          <i class="fas fa-building service-icon"></i>
        </div>
        <h3 class="service-card-title">Company Registration</h3>
        <p class="service-description">Comprehensive company registration services to support your business operations and financial management.</p>
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
      <p class="contact-subtitle">We'd love to hear from you!</p>
    </div>

    <!-- Two Columns: Contact Info + Form -->
    <div class="contact-wrapper">
      <!-- Left: Contact Info Cards -->
      <div class="contact-info">
        <div class="info-card">
          <div class="info-icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <h3>Our Office</h3>
          <p>123 Financial District,<br>New York, NY 10001</p>
        </div>
        <div class="info-card">
          <div class="info-icon">
            <i class="fas fa-phone-alt"></i>
          </div>
          <h3>Phone</h3>
          <p>+1 (555) 123-4567<br>+1 (555) 987-6543</p>
        </div>
        <div class="info-card">
          <div class="info-icon">
            <i class="fas fa-envelope"></i>
          </div>
          <h3>Email</h3>
          <p>info@accountech.com<br>support@accountech.com</p>
        </div>
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
        <h2 class="form-title">Get In Touch</h2>
        <p class="form-description">Have questions or want to learn more? Reach out to us!</p>
        <form class="contact-form" action="#" method="POST">
          <div class="form-group">
            <label for="name">Full Name *</label>
            <input type="text" id="name" name="name" placeholder="John Doe" required>
          </div>
          <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" placeholder="john@example.com" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="+1 234 567 890">
          </div>
          <div class="form-group">
            <label for="message">Message *</label>
            <textarea id="message" name="message" rows="5" placeholder="Your message here..." required></textarea>
          </div>
          <button type="submit" class="submit-btn">
            Send Message <i class="fas fa-paper-plane"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection