@extends('layouts.frontend')
@section('title', 'CABhavika || About Us')
@push('styles')
    <link rel="stylesheet" href="{{ asset('front_assets/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('front_assets/js/index.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
@endpush

@section('content')

<!-- ========================
     ABOUT HERO SECTION
========================= -->
<section class="about-hero-section">
    <div class="about-hero-bg">
        <img src="{{ asset('front_assets/images/aboutsection1.jpeg') }}" alt="About Us Background">
        <div class="about-hero-overlay"></div>
    </div>
    <div class="container">
        <div class="about-hero-content wow animate__animated animate__fadeInUp">
            <span class="hero-badge">About CABhavika</span>
            <h1>Your Trusted Partner in<br><span class="highlight">Financial Excellence</span></h1>
            <p>Empowering businesses and individuals with expert accounting solutions,<br>professional training, and financial advisory services since 2014.</p>
            <div class="hero-stats">
                <div class="stat">
                    <h3>10+</h3>
                    <p>Years of Excellence</p>
                </div>
                <div class="stat">
                    <h3>5000+</h3>
                    <p>Students Trained</p>
                </div>
                <div class="stat">
                    <h3>98%</h3>
                    <p>Success Rate</p>
                </div>
                <div class="stat">
                    <h3>50+</h3>
                    <p>Expert Faculty</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     OUR MISSION & VISION
========================= -->
<section class="mission-vision-section">
    <div class="container">
        <div class="mission-vision-grid">
            <div class="mission-card wow animate__animated animate__fadeInLeft">
                <div class="card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>Our Mission</h3>
                <p>To provide exceptional accounting and financial education that transforms careers and empowers businesses to achieve sustainable growth through innovative solutions.</p>
            </div>
            <div class="vision-card wow animate__animated animate__fadeInRight">
                <div class="card-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Our Vision</h3>
                <p>To become India's most trusted financial education and advisory platform, recognized for excellence, innovation, and creating industry-ready professionals.</p>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     OUR STORY SECTION
========================= -->
<section class="story-section">
    <div class="container">
        <div class="story-grid">
            <div class="story-content wow animate__animated animate__fadeInLeft">
                <span class="section-subtitle">Our Story</span>
                <h2>Building Financial Excellence<br>Since 2014</h2>
                <p>CABhavika was founded with a simple yet powerful vision - to bridge the gap between academic knowledge and practical financial expertise. Over the past decade, we have grown from a small training center to a premier institution recognized for excellence in accounting education and financial advisory.</p>
                <p>Our journey has been fueled by passion, dedication, and an unwavering commitment to quality. We've successfully trained over 5,000 students, partnered with 100+ businesses, and built a team of 50+ expert faculty members who bring real-world experience to the classroom.</p>
                <div class="story-features">
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Industry-Ready Curriculum</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Practical Training Approach</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>100% Placement Support</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Recognized Certifications</span>
                    </div>
                </div>
                <a href="{{ URL::to('/contact') }}" class="btn-primary">Join Our Journey <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="story-image wow animate__animated animate__fadeInRight">
                <div class="image-wrapper">
                    <img src="{{ asset('front_assets/images/aboutsection2.jpeg') }}" alt="Our Story">
                    <div class="experience-badge">
                        <div class="years">10+</div>
                        <div class="text">Years of<br>Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     OUR VALUES SECTION
========================= -->
<section class="values-section">
    <div class="container">
        <div class="section-header wow animate__animated animate__fadeInUp">
            <span class="section-subtitle">Our Core Values</span>
            <h2>What Drives Us Every Day</h2>
            <p>The principles that guide our actions and decisions</p>
        </div>
        <div class="values-grid">
            <div class="value-card wow animate__animated animate__fadeInUp" data-delay="0.1s">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Integrity</h3>
                <p>We uphold the highest standards of honesty and transparency in everything we do.</p>
            </div>
            <div class="value-card wow animate__animated animate__fadeInUp" data-delay="0.2s">
                <div class="value-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Excellence</h3>
                <p>We strive for excellence in education, training, and client service.</p>
            </div>
            <div class="value-card wow animate__animated animate__fadeInUp" data-delay="0.3s">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Innovation</h3>
                <p>We embrace innovation and continuously evolve our teaching methodologies.</p>
            </div>
            <div class="value-card wow animate__animated animate__fadeInUp" data-delay="0.4s">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Collaboration</h3>
                <p>We believe in collaborative learning and building lasting partnerships.</p>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     TEAM SECTION
========================= -->
<section class="team-section">
    <div class="container">
        <div class="section-header wow animate__animated animate__fadeInUp">
            <span class="section-subtitle">Our Leadership</span>
            <h2>Meet Our Expert Team</h2>
            <p>Industry professionals dedicated to your success</p>
        </div>
        <div class="team-grid">
            <div class="team-card wow animate__animated animate__fadeInUp" data-delay="0.1s">
                <div class="team-image">
                    <img src="{{ asset('front_assets/images/team1.jpg') }}" alt="Team Member">
                    <div class="team-social">
                   <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>CA. Rajesh Kumar</h3>
                    <p>Founder & CEO</p>
                    <span>15+ Years Experience</span>
                </div>
            </div>
            <div class="team-card wow animate__animated animate__fadeInUp" data-delay="0.2s">
                <div class="team-image">
                    <img src="{{ asset('front_assets/images/team2.jpg') }}" alt="Team Member">
                    <div class="team-social">
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>CA. Priya Sharma</h3>
                    <p>Director of Academics</p>
                    <span>12+ Years Experience</span>
                </div>
            </div>
            <div class="team-card wow animate__animated animate__fadeInUp" data-delay="0.3s">
                <div class="team-image">
                    <img src="{{ asset('front_assets/images/team3.jpg') }}" alt="Team Member">
                    <div class="team-social">
                         <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>CA. Amit Verma</h3>
                    <p>Head of Training</p>
                    <span>10+ Years Experience</span>
                </div>
            </div>
            <div class="team-card wow animate__animated animate__fadeInUp" data-delay="0.4s">
                <div class="team-image">
                    <img src="https://randomuser.me/api/portraits/women/89.jpg" alt="Team Member">
                    <div class="team-social">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Dr. Neha Gupta</h3>
                    <p>Financial Advisor</p>
                    <span>8+ Years Experience</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     ACHIEVEMENTS SECTION
========================= -->
<section class="achievements-section">
    <div class="container">
        <div class="section-header wow animate__animated animate__fadeInUp">
            <span class="section-subtitle">Our Achievements</span>
            <h2>Numbers That Speak<br>For Themselves</h2>
        </div>
        <div class="achievements-grid">
            <div class="achievement-card wow animate__animated animate__fadeInUp" data-delay="0.1s">
                <div class="achievement-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="counter" data-count="5000">70+</h3>
                <p>Students Trained</p>
            </div>
            <div class="achievement-card wow animate__animated animate__fadeInUp" data-delay="0.2s">
                <div class="achievement-icon">
                    <i class="fas fa-smile"></i>
                </div>
                <h3 class="counter" data-count="98">98%</h3>
                <p>Success Rate (%)</p>
            </div>
            <div class="achievement-card wow animate__animated animate__fadeInUp" data-delay="0.3s">
                <div class="achievement-icon">
                    <i class="fas fa-chalkboard-user"></i>
                </div>
                <h3 class="counter" data-count="50">50+</h3>
                <p>Expert Faculty</p>
            </div>
            <div class="achievement-card wow animate__animated animate__fadeInUp" data-delay="0.4s">
                <div class="achievement-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="counter" data-count="100">100+</h3>
                <p>Corporate Partners</p>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     TESTIMONIALS SECTION
========================= -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header wow animate__animated animate__fadeInUp">
            <span class="section-subtitle">Testimonials</span>
            <h2>What Our Students Say</h2>
            <p>Real stories from people who transformed their careers with us</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card wow animate__animated animate__fadeInUp" data-delay="0.1s">
                <div class="quote-icon">
                    <i class="fas fa-quote-left"></i>
                </div>
                <p>The practical training at CABhavika completely transformed my understanding of accounting. The faculty is exceptional and always ready to help.</p>
                <div class="client-info">
                    <img src="{{ asset('front_assets/images/test1.jpg') }}" alt="Client">
                    <div>
                        <h4>Rahul Mehta</h4>
                        <span>Senior Accountant</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card wow animate__animated animate__fadeInUp" data-delay="0.2s">
                <div class="quote-icon">
                    <i class="fas fa-quote-left"></i>
                </div>
                <p>I got placed in a top MNC right after completing my course. The placement support and interview preparation were outstanding.</p>
                <div class="client-info">
                    <img src="{{ asset('front_assets/images/test2.jpg') }}" alt="Client">
                    <div>
                        <h4>Priyanka Singh</h4>
                        <span>Financial Analyst</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card wow animate__animated animate__fadeInUp" data-delay="0.3s">
                <div class="quote-icon">
                    <i class="fas fa-quote-left"></i>
                </div>
                <p>The faculty's real-world experience makes all the difference. Every concept is taught with practical examples and case studies.</p>
                <div class="client-info">
                    <img src="{{ asset('front_assets/images/test3.jpg') }}" alt="Client">
                    <div>
                        <h4>Amit Patel</h4>
                        <span>Tax Consultant</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     CTA SECTION
========================= -->
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