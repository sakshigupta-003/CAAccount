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
                        <img src="{{ asset('front_assets/images/tally.png') }}" alt="Tally Prime Course"
                            class="course-image">
                        <div class="course-overlay">
                            <span class="course-price">$199</span>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Tally Prime</h3>
                        <p class="course-description">Learn the fundamentals of Tally Prime accounting software, from basic
                            entries to advanced reporting.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 6 weeks</span>
                            <span><i class="fas fa-users"></i> Beginner</span>
                        </div>
                        <a href="{{ route('course.detail', 1) }}" class="course-btn">Learn More <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="course-card">
                    <div class="course-image-wrapper">
                        <img src="{{ asset('front_assets/images/gst.jpg') }}" alt="GST Training Course"
                            class="course-image">
                        <div class="course-overlay">
                            <span class="course-price">$249</span>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">GST Training</h3>
                        <p class="course-description">Master GST compliance, return filing, input tax credit, and latest
                            updates in Indian taxation.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 8 weeks</span>
                            <span><i class="fas fa-users"></i> Intermediate</span>
                        </div>
                        <a href="{{ route('course.detail', 2) }}" class="course-btn">Learn More <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Course Card 3 -->
                <div class="course-card">
                    <div class="course-image-wrapper">
                        <img src="{{ asset('front_assets/images/advanced.jpg') }}" alt="Advanced Excel Course"
                            class="course-image">
                        <div class="course-overlay">
                            <span class="course-price">$149</span>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Advanced Excel</h3>
                        <p class="course-description">Enhance your professional skills with pivot tables, macros, and data
                            visualization techniques.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 5 weeks</span>
                            <span><i class="fas fa-users"></i> Beginner to Advanced</span>
                        </div>
                        <a href="{{ route('course.detail', 3) }}" class="course-btn">Learn More <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Course Card 4 -->
                <div class="course-card">
                    <div class="course-image-wrapper">
                        <img src="{{ asset('front_assets/images/acocunt.jpg') }}" alt="Accounting Training"
                            class="course-image">
                        <div class="course-overlay">
                            <span class="course-price">$299</span>
                        </div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Accounting Training</h3>
                        <p class="course-description">Master the art of accounting, financial statements, ledgers, and
                            real-world bookkeeping.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 10 weeks</span>
                            <span><i class="fas fa-users"></i> All Levels</span>
                        </div>
                        <a href="{{ route('course.detail', 4) }}" class="course-btn">Learn More <i
                                class="fas fa-arrow-right"></i></a>
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
                        <p class="course-description">Learn income tax, corporate tax, TDS, and tax planning strategies for
                            individuals and businesses.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 9 weeks</span>
                            <span><i class="fas fa-users"></i> Intermediate</span>
                        </div>
                        <a href="{{ route('course.detail', 5) }}" class="course-btn">Learn More <i
                                class="fas fa-arrow-right"></i></a>
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
                        <p class="course-description">Understand cost allocation, variance analysis, and management
                            accounting principles for effective financial decision-making.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 8 weeks</span>
                            <span><i class="fas fa-users"></i> Intermediate</span>
                        </div>
                        <a href="{{ route('course.detail', 6) }}" class="course-btn">Learn More <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection