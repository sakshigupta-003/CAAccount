@extends('layouts.frontend')
@section('title', 'CABhavika || Home')
@push('styles')
    <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('front_assets/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
@endpush

@section('content')
    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-container">
            <div class="hero-content wow animate__animated animate__fadeInUp">
                <span class="hero-badge">Welcome to CABhavika</span>
                <h1 class="hero-title">
                    Your Trusted Partner in<br>
                    <span class="hero-highlight">Accounting & Finance</span>
                </h1>
                <p class="hero-description">
                    Empowering businesses with expert accounting solutions, financial advisory, 
                    and professional training. Let's grow together!
                </p>
                <div class="hero-buttons">
                    <a href="{{ URL::to('/courses') }}" class="btn-primary">
                        Explore Courses <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ URL::to('/contact') }}" class="btn-outline">
                        Get Free Consultation <i class="fas fa-headset"></i>
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <h3>5000+</h3>
                        <p>Students Trained</p>
                    </div>
                    <div class="stat-item">
                        <h3>98%</h3>
                        <p>Success Rate</p>
                    </div>
                    <div class="stat-item">
                        <h3>50+</h3>
                        <p>Expert Faculty</p>
                    </div>
                </div>
            </div>
            <div class="hero-image wow animate__animated animate__fadeInRight">
                <div class="hero-image-wrapper">
                    <img src="{{ asset('front_assets/images/hero1.avif') }}" alt="Hero Illustration">
                    <div class="floating-card card-1">
                        <i class="fas fa-chart-line"></i>
                        <span>Financial Growth</span>
                    </div>
                    <div class="floating-card card-2">
                        <i class="fas fa-users"></i>
                        <span>Expert Support</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- ABOUT US SECTION -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="section-header wow animate__animated animate__fadeInUp">
                <span class="section-subtitle">About Us</span>
                <h2 class="section-title">We're More Than Just<br>An Accounting Firm</h2>
                <p class="section-description">Discover why thousands trust CABhavika for their financial success</p>
            </div>
            
            <div class="about-content">
                <div class="about-left wow animate__animated animate__fadeInLeft">
                    <div class="about-image-grid">
                        <div class="grid-item grid-main">
                            <img src="{{ asset('front_assets/images/about1.jpeg') }}" alt="About Main">
                        </div>
                        <div class="grid-item grid-small">
                            <img src="{{ asset('front_assets/images/about2.jpeg') }}" alt="About Small">
                        </div>
                        <div class="experience-badge">
                            <div class="years">10+</div>
                            <div class="text">Years of Excellence</div>
                        </div>
                    </div>
                </div>
                
                <div class="about-right wow animate__animated animate__fadeInRight">
                    <h3>Your Success Is Our Mission</h3>
                    <p>CABhavika is a premier accounting and finance training institute dedicated to shaping future financial experts. With a decade of experience, we've successfully trained over 5,000 students and helped businesses achieve financial excellence.</p>
                    
                    <div class="features-grid">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Industry Recognized</h4>
                                <p>Certified courses with global recognition</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-chalkboard-user"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Expert Faculty</h4>
                                <p>Learn from industry professionals</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Practical Training</h4>
                                <p>Hands-on experience with real projects</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Placement Support</h4>
                                <p>100% job assistance guarantee</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-stats">
                        <div class="stat">
                            <div class="stat-number" data-count="5000">0</div>
                            <div class="stat-label">Students Trained</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number" data-count="98">0</div>
                            <div class="stat-label">Success Rate%</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number" data-count="50">0</div>
                            <div class="stat-label">Expert Faculty</div>
                        </div>
                    </div>
                    
                    <a href="{{ URL::to('/about') }}" class="btn-learn-more">
                        Learn More About Us <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

<!-- SERVICES SECTION -->
<section class="services-section" id="services">
    <div class="container">
        <div class="section-header wow animate__animated animate__fadeInUp">
            <span class="section-subtitle">Our Services</span>
            <h2 class="section-title">Comprehensive Financial<br>Solutions For Your Business</h2>
            <p class="section-description">We offer a wide range of professional services to meet your financial needs</p>
        </div>
        
        <div class="services-grid">
            <!-- Service 1 -->
            <div class="service-card wow animate__animated animate__fadeInUp" data-delay="0.1s">
                <div class="service-icon">
                    <i class="fas fa-chart-pie"></i>
                    <div class="service-icon-bg"></div>
                </div>
                <h3>Financial Planning</h3>
                <p>Strategic financial planning and wealth management for individuals and businesses to achieve long-term goals.</p>
                <a href="{{ URL::to('/services/financial-planning') }}" class="service-link">
                    Learn More <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Service 2 -->
            <div class="service-card wow animate__animated animate__fadeInUp" data-delay="0.2s">
                <div class="service-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <div class="service-icon-bg"></div>
                </div>
                <h3>Tax Consultation</h3>
                <p>Expert tax planning and compliance services including GST, income tax, and corporate tax solutions.</p>
                <a href="{{ URL::to('/services/tax-consultation') }}" class="service-link">
                    Learn More <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Service 3 -->
            <div class="service-card wow animate__animated animate__fadeInUp" data-delay="0.3s">
                <div class="service-icon">
                    <i class="fas fa-balance-scale"></i>
                    <div class="service-icon-bg"></div>
                </div>
                <h3>Audit & Assurance</h3>
                <p>Comprehensive audit services ensuring compliance, transparency, and financial accuracy for your business.</p>
                <a href="{{ URL::to('/services/audit-assurance') }}" class="service-link">
                    Learn More <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Second Row (Optional - Remove if you want only 3 cards) -->
        <div class="services-grid second-row">
            <!-- Service 4 -->
            <div class="service-card wow animate__animated animate__fadeInUp" data-delay="0.4s">
                <div class="service-icon">
                    <i class="fas fa-building"></i>
                    <div class="service-icon-bg"></div>
                </div>
                <h3>Business Advisory</h3>
                <p>Strategic business consulting for growth, mergers, acquisitions, and operational efficiency.</p>
                <a href="{{ URL::to('/services/business-advisory') }}" class="service-link">
                    Learn More <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Service 5 -->
            <div class="service-card wow animate__animated animate__fadeInUp" data-delay="0.5s">
                <div class="service-icon">
                    <i class="fas fa-hand-holding-usd"></i>
                    <div class="service-icon-bg"></div>
                </div>
                <h3>Investment Management</h3>
                <p>Professional portfolio management and investment strategies to maximize your returns.</p>
                <a href="{{ URL::to('/services/investment-management') }}" class="service-link">
                    Learn More <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Service 6 -->
            <div class="service-card wow animate__animated animate__fadeInUp" data-delay="0.6s">
                <div class="service-icon">
                    <i class="fas fa-phone-alt"></i>
                    <div class="service-icon-bg"></div>
                </div>
                <h3>24/7 Support</h3>
                <p>Round-the-clock customer support for all your financial queries and assistance needs.</p>
                <a href="{{ URL::to('/services/support') }}" class="service-link">
                    Learn More <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        
       <div class="services-footer wow animate__animated animate__fadeInUp">
    <a href="{{ URL::to('/services') }}" class="btn-view-all">
        View All Services <i class="fas fa-arrow-right"></i>
    </a>
</div>
    </div>
</section>
   <!-- COURSES SECTION -->
<section class="courses-section" id="courses">
    <div class="container">
        <div class="section-header wow animate__animated animate__fadeInUp">
            <span class="section-subtitle">Popular Courses</span>
            <h2 class="section-title">Choose Your Path to<br>Financial Excellence</h2>
            <p class="section-description">Industry-leading courses designed to boost your career</p>
        </div>
        
        <div class="courses-grid">
            <!-- Course 1 -->
            <div class="course-card wow animate__animated animate__fadeInUp" data-delay="0.1s">
                <div class="course-badge">Popular</div>
                <div class="course-image">
                    <img src="{{ asset('front_assets/images/course1.jpeg') }}" alt="Accounting Course">
                    <div class="course-overlay">
                        <a href="#" class="preview-btn"><i class="fas fa-play"></i> Preview</a>
                    </div>
                </div>
                <div class="course-content">
                    <div class="course-category">
                        <i class="fas fa-book"></i> Accounting
                    </div>
                    <h3 class="course-title">Professional Accounting & Taxation</h3>
                    <p class="course-description">Master accounting principles, GST, TDS, and income tax with practical training.</p>
                    <div class="course-meta">
                        <span><i class="fas fa-clock"></i> 6 Months</span>
                        <span><i class="fas fa-user-graduate"></i> 1,200+ Students</span>
                        <span><i class="fas fa-chart-line"></i> Beginner to Advanced</span>
                    </div>
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="old-price">₹25,000</span>
                            <span class="new-price">₹18,999</span>
                        </div>
                        <a href="{{ URL::to('/courses/accounting') }}" class="enroll-btn">
                            Enroll Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Course 2 -->
            <div class="course-card wow animate__animated animate__fadeInUp" data-delay="0.2s">
                <div class="course-badge featured">Featured</div>
                <div class="course-image">
                    <img src="{{ asset('front_assets/images/course2.jpeg') }}" alt="Financial Course">
                    <div class="course-overlay">
                        <a href="#" class="preview-btn"><i class="fas fa-play"></i> Preview</a>
                    </div>
                </div>
                <div class="course-content">
                    <div class="course-category">
                        <i class="fas fa-chart-pie"></i> Finance
                    </div>
                    <h3 class="course-title">Financial Analysis & Investment Banking</h3>
                    <p class="course-description">Learn financial modeling, valuation, M&A, and investment strategies.</p>
                    <div class="course-meta">
                        <span><i class="fas fa-clock"></i> 4 Months</span>
                        <span><i class="fas fa-user-graduate"></i> 850+ Students</span>
                        <span><i class="fas fa-chart-line"></i> Intermediate</span>
                    </div>
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="old-price">₹35,000</span>
                            <span class="new-price">₹24,999</span>
                        </div>
                        <a href="{{ URL::to('/courses/finance') }}" class="enroll-btn">
                            Enroll Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Course 3 -->
            <div class="course-card wow animate__animated animate__fadeInUp" data-delay="0.3s">
                <div class="course-badge">Popular</div>
                <div class="course-image">
                    <img src="{{ asset('front_assets/images/course3.jpg') }}" alt="Tally Course">
                    <div class="course-overlay">
                        <a href="#" class="preview-btn"><i class="fas fa-play"></i> Preview</a>
                    </div>
                </div>
                <div class="course-content">
                    <div class="course-category">
                        <i class="fas fa-calculator"></i> Software
                    </div>
                    <h3 class="course-title">Tally Prime & ERP 9 Mastery</h3>
                    <p class="course-description">Complete Tally training with GST, inventory, payroll, and reporting.</p>
                    <div class="course-meta">
                        <span><i class="fas fa-clock"></i> 3 Months</span>
                        <span><i class="fas fa-user-graduate"></i> 2,500+ Students</span>
                        <span><i class="fas fa-chart-line"></i> Beginner</span>
                    </div>
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="old-price">₹15,000</span>
                            <span class="new-price">₹9,999</span>
                        </div>
                        <a href="{{ URL::to('/courses/tally') }}" class="enroll-btn">
                            Enroll Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Course 4 - NEW -->
            <div class="course-card wow animate__animated animate__fadeInUp" data-delay="0.4s">
                <div class="course-image">
                    <img src="{{ asset('front_assets/images/course4.jpg') }}" alt="GST Course">
                    <div class="course-overlay">
                        <a href="#" class="preview-btn"><i class="fas fa-play"></i> Preview</a>
                    </div>
                </div>
                <div class="course-content">
                    <div class="course-category">
                        <i class="fas fa-file-invoice"></i> Taxation
                    </div>
                    <h3 class="course-title">GST Practitioner Course</h3>
                    <p class="course-description">Complete GST training including registration, returns, billing, and compliance.</p>
                    <div class="course-meta">
                        <span><i class="fas fa-clock"></i> 3 Months</span>
                        <span><i class="fas fa-user-graduate"></i> 950+ Students</span>
                        <span><i class="fas fa-chart-line"></i> Beginner to Advanced</span>
                    </div>
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="old-price">₹18,000</span>
                            <span class="new-price">₹12,999</span>
                        </div>
                        <a href="{{ URL::to('/courses/gst') }}" class="enroll-btn">
                            Enroll Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Course 5 - NEW -->
            <div class="course-card wow animate__animated animate__fadeInUp" data-delay="0.5s">
                <div class="course-badge featured">New</div>
                <div class="course-image">
                    <img src="{{ asset('front_assets/images/course5.jpg') }}" alt="SAP Course">
                    <div class="course-overlay">
                        <a href="#" class="preview-btn"><i class="fas fa-play"></i> Preview</a>
                    </div>
                </div>
                <div class="course-content">
                    <div class="course-category">
                        <i class="fas fa-chart-line"></i> ERP
                    </div>
                    <h3 class="course-title">SAP FICO Certification</h3>
                    <p class="course-description">Master SAP Financial Accounting & Controlling modules with real projects.</p>
                    <div class="course-meta">
                        <span><i class="fas fa-clock"></i> 5 Months</span>
                        <span><i class="fas fa-user-graduate"></i> 650+ Students</span>
                        <span><i class="fas fa-chart-line"></i> Intermediate</span>
                    </div>
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="old-price">₹45,000</span>
                            <span class="new-price">₹34,999</span>
                        </div>
                        <a href="{{ URL::to('/courses/sap') }}" class="enroll-btn">
                            Enroll Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Course 6 - NEW -->
            <div class="course-card wow animate__animated animate__fadeInUp" data-delay="0.6s">
                <div class="course-image">
                    <img src="{{ asset('front_assets/images/course6.jpg') }}" alt="Excel Course">
                    <div class="course-overlay">
                        <a href="#" class="preview-btn"><i class="fas fa-play"></i> Preview</a>
                    </div>
                </div>
                <div class="course-content">
                    <div class="course-category">
                        <i class="fas fa-table"></i> Microsoft Office
                    </div>
                    <h3 class="course-title">Advanced Excel & Data Analysis</h3>
                    <p class="course-description">Master Excel formulas, pivot tables, macros, and data visualization techniques.</p>
                    <div class="course-meta">
                        <span><i class="fas fa-clock"></i> 2 Months</span>
                        <span><i class="fas fa-user-graduate"></i> 3,200+ Students</span>
                        <span><i class="fas fa-chart-line"></i> Beginner to Advanced</span>
                    </div>
                    <div class="course-footer">
                        <div class="course-price">
                            <span class="old-price">₹12,000</span>
                            <span class="new-price">₹7,999</span>
                        </div>
                        <a href="{{ URL::to('/courses/excel') }}" class="enroll-btn">
                            Enroll Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="courses-footer wow animate__animated animate__fadeInUp">
            <a href="{{ URL::to('/courses') }}" class="btn-view-all">
                View All Courses <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

    <!-- WHY CHOOSE US SECTION -->
    <section class="why-choose-section">
        <div class="container">
            <div class="section-header wow animate__animated animate__fadeInUp">
                <span class="section-subtitle">Why Choose Us</span>
                <h2 class="section-title">What Makes CABhavika<br>The Best Choice</h2>
            </div>
            
            <div class="features-container">
                <div class="feature-card wow animate__animated animate__fadeInLeft">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Expert Faculty</h3>
                    <p>Learn from CA professionals with 10+ years of industry experience</p>
                </div>
                
                <div class="feature-card wow animate__animated animate__fadeInUp">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3>Practical Training</h3>
                    <p>Hands-on projects and real-world case studies for better understanding</p>
                </div>
                
                <div class="feature-card wow animate__animated animate__fadeInUp">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Industry Certification</h3>
                    <p>Get recognized certificates that boost your career prospects</p>
                </div>
                
                <div class="feature-card wow animate__animated animate__fadeInRight">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Placement Assistance</h3>
                    <p>100% job placement support with top MNCs and firms</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content wow animate__animated animate__fadeInUp">
                <h2>Ready to Start Your Journey?</h2>
                <p>Join thousands of successful students who transformed their careers with CABhavika</p>
                <div class="cta-buttons">
                    <a href="{{ URL::to('/contact') }}" class="cta-btn-primary">
                        Get Started Now <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="{{ URL::to('/courses') }}" class="cta-btn-secondary">
                        Browse Courses <i class="fas fa-book-open"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection