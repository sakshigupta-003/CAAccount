@extends('layouts.frontend')
@section('title', isset($course) ? $course->name . ' || Accountech' : 'Course Details || Accountech')

@push('styles')
  <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
  <style>
    /* ============================================
     COURSE DETAILS PAGE - PROFESSIONAL CSS
     ============================================ */

    /* Global Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* ============================================
     COURSE DETAILS SECTION
     ============================================ */
    .course-details-section {
      padding: 80px 20px;
      background: linear-gradient(145deg, #f8fafc 0%, #eef2f9 100%);
      position: relative;
      overflow: hidden;
    }

    /* Animated background circles */
    .course-details-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -20%;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, rgba(19, 137, 201, 0.03) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .course-details-section::after {
      content: '';
      position: absolute;
      bottom: -30%;
      left: -10%;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(19, 137, 201, 0.04) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .course-details-container {
      max-width: 1280px;
      margin: 0 auto;
      position: relative;
      z-index: 1;
    }

    .course-details-grid {
      display: grid;
      grid-template-columns: 1fr 380px;
      gap: 40px;
    }

    /* ============================================
     MAIN CONTENT CARD
     ============================================ */
    .course-details-main {
      background: #ffffff;
      border-radius: 32px;
      overflow: hidden;
      box-shadow: 0 30px 50px -20px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .course-details-main:hover {
      box-shadow: 0 40px 60px -25px rgba(19, 137, 201, 0.2);
    }

    /* Course Image */
    .course-details-image {
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, #0a2540, #0f3b5c);
    }

    .course-details-image img {
      width: 100%;
      height: 420px;
      object-fit: cover;
      transition: transform 0.7s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    .course-details-image:hover img {
      transform: scale(1.05);
    }

    /* Image Overlay Gradient */
    .course-details-image::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 100px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);
      pointer-events: none;
    }

    /* Course Badge (Optional) */
    .course-badge {
      position: absolute;
      top: 20px;
      right: 20px;
      background: linear-gradient(135deg, #ffd966, #ffb347);
      color: #0a2540;
      padding: 8px 18px;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.85rem;
      z-index: 2;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Description & Curriculum Sections */
    .course-details-description,
    .course-curriculum {
      padding: 40px 36px;
      border-bottom: 1px solid #eef2f6;
    }

    .course-details-description h2,
    .course-curriculum h2 {
      font-size: 1.8rem;
      font-weight: 800;
      color: #0a2540;
      margin-bottom: 24px;
      position: relative;
      display: inline-flex;
      align-items: center;
      gap: 12px;
    }

    .course-details-description h2 i,
    .course-curriculum h2 i {
      color: rgb(19, 137, 201);
      font-size: 1.8rem;
    }

    .course-details-description h2::after,
    .course-curriculum h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 70px;
      height: 4px;
      background: linear-gradient(90deg, rgb(19, 137, 201), #60a5fa);
      border-radius: 4px;
    }

    .course-details-description p {
      color: #475569;
      line-height: 1.85;
      font-size: 1.05rem;
      margin-top: 20px;
      text-align: justify;
    }

    /* Curriculum List */
    .curriculum-list {
      list-style: none;
      padding: 0;
      margin-top: 25px;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .curriculum-list li {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 14px 18px;
      background: #f8fafc;
      border-radius: 16px;
      color: #334155;
      font-size: 1rem;
      font-weight: 500;
      transition: all 0.3s ease;
      border: 1px solid transparent;
    }

    .curriculum-list li i {
      color: rgb(19, 137, 201);
      font-size: 1.25rem;
      width: 28px;
      transition: transform 0.2s;
    }

    .curriculum-list li:hover {
      background: linear-gradient(135deg, #f0f9ff, #e6f0fa);
      border-color: rgba(19, 137, 201, 0.2);
      transform: translateX(8px);
    }

    .curriculum-list li:hover i {
      transform: scale(1.1);
    }

    /* ============================================
     SIDEBAR (Sticky)
     ============================================ */
    .course-details-sidebar {
      position: sticky;
      top: 100px;
      height: fit-content;
    }

    .course-info-card {
      background: linear-gradient(135deg, #ffffff, #fefefe);
      border-radius: 28px;
      padding: 32px;
      box-shadow: 0 25px 45px -15px rgba(0, 0, 0, 0.12);
      border: 1px solid rgba(19, 137, 201, 0.15);
      transition: transform 0.3s ease;
    }

    .course-info-card:hover {
      transform: translateY(-5px);
    }

    /* Price Section */
    .course-price {
      text-align: center;
      padding-bottom: 25px;
      margin-bottom: 25px;
      border-bottom: 2px dashed #eef2f6;
      position: relative;
    }

    .price-label {
      display: block;
      font-size: 0.85rem;
      color: #5a6e8a;
      margin-bottom: 10px;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-weight: 600;
    }

    .price-value {
      font-size: 3.2rem;
      font-weight: 800;
      background: linear-gradient(135deg, rgb(19, 137, 201), #0f53ab);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .price-value small {
      font-size: 1rem;
      color: #5a6e8a;
      background: none;
      -webkit-background-clip: unset;
      background-clip: unset;
    }

    /* Info Items */
    .course-info-item {
      display: flex;
      align-items: center;
      gap: 18px;
      padding: 16px 0;
      border-bottom: 1px solid #f1f5f9;
      transition: all 0.3s ease;
    }

    .course-info-item:hover {
      background: #f8fafc;
      padding-left: 12px;
      border-radius: 12px;
    }

    .course-info-item i {
      width: 48px;
      height: 48px;
      background: linear-gradient(135deg, rgba(19, 137, 201, 0.12), rgba(19, 137, 201, 0.06));
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: rgb(19, 137, 201);
      font-size: 1.3rem;
      transition: all 0.3s;
    }

    .course-info-item:hover i {
      background: linear-gradient(135deg, rgb(19, 137, 201), #0f53ab);
      color: white;
      transform: scale(1.05);
    }

    .course-info-item strong {
      display: block;
      font-size: 0.75rem;
      color: #6c7a91;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 4px;
    }

    .course-info-item p {
      font-size: 1rem;
      font-weight: 700;
      color: #0a2540;
      margin: 0;
    }

    /* Enroll Button */
    .enroll-btn {
      width: 100%;
      background: linear-gradient(135deg, rgb(19, 137, 201), #0f53ab);
      border: none;
      color: white;
      font-weight: 700;
      padding: 18px 20px;
      border-radius: 60px;
      font-size: 1.1rem;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      margin-top: 30px;
      position: relative;
      overflow: hidden;
    }

    .enroll-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s;
    }

    .enroll-btn:hover::before {
      left: 100%;
    }

    .enroll-btn:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 35px rgba(19, 137, 201, 0.4);
      gap: 18px;
    }

    /* ============================================
     RELATED COURSES SECTION
     ============================================ */
    .related-courses {
      padding: 70px 20px 90px;
      background: linear-gradient(135deg, #ffffff, #fefefe);
      position: relative;
    }

    .related-courses-container {
      max-width: 1280px;
      margin: 0 auto;
    }

    .related-title {
      text-align: center;
      font-size: 2.2rem;
      font-weight: 800;
      color: #0a2540;
      margin-bottom: 55px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 15px;
    }

    .related-title i {
      color: rgb(19, 137, 201);
      font-size: 2rem;
    }

    .related-title::after {
      content: '';
      position: absolute;
      bottom: -18px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, rgb(19, 137, 201), #60a5fa);
      border-radius: 4px;
    }

    .related-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(310px, 1fr));
      gap: 35px;
    }

    .related-card {
      background: #ffffff;
      border-radius: 24px;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
      border: 1px solid #eef2f6;
      box-shadow: 0 10px 25px -10px rgba(0, 0, 0, 0.05);
      position: relative;
    }

    .related-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, rgb(19, 137, 201), #60a5fa);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.4s;
    }

    .related-card:hover::before {
      transform: scaleX(1);
    }

    .related-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 30px 45px -18px rgba(19, 137, 201, 0.25);
      border-color: rgba(19, 137, 201, 0.2);
    }

    .related-card img {
      width: 100%;
      height: 210px;
      object-fit: cover;
      transition: transform 0.6s ease;
    }

    .related-card:hover img {
      transform: scale(1.06);
    }

    .related-card-content {
      padding: 24px;
      text-align: center;
    }

    .related-card-content h3 {
      font-size: 1.3rem;
      font-weight: 700;
      color: #0a2540;
      margin-bottom: 10px;
    }

    .related-price {
      color: rgb(19, 137, 201);
      font-weight: 800;
      font-size: 1.4rem;
      margin-bottom: 20px;
    }

    /* Related Button - Base Style */
    .related-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: transparent;
      border: 2px solid rgb(19, 137, 201);
      color: rgb(19, 137, 201);
      padding: 12px 32px;
      border-radius: 60px;
      text-decoration: none;
      font-weight: 700;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    /* Hover State */
    .related-btn:hover {
      background: rgb(19, 137, 201);
      color: white;
      gap: 15px;
      transform: translateX(5px);
      box-shadow: 0 8px 20px rgba(19, 137, 201, 0.3);
    }

    /* Active State (when clicking) */
    .related-btn:active {
      background: #0f53ab;
      /* darker blue for click feedback */
      color: white;
      transform: translateX(3px) scale(0.97);
      box-shadow: 0 4px 10px rgba(19, 137, 201, 0.2);
      transition: all 0.05s ease;
    }

    /* Focus State (accessibility) */
    .related-btn:focus-visible {
      outline: 3px solid #ffb347;
      outline-offset: 3px;
      border-radius: 60px;
    }

    /* Disabled State (optional) */
    .related-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
      pointer-events: none;
    }

    /* Optional: Different hover effect for dark backgrounds */
    .dark-bg .related-btn:hover {
      background: white;
      color: rgb(19, 137, 201);
      border-color: white;
    }

    .related-btn i {
      transition: transform 0.2s;
    }

    .related-btn:hover {
      background: linear-gradient(135deg, rgb(19, 137, 201), #0f53ab);
      color: white;
      gap: 15px;
      box-shadow: 0 8px 20px rgba(19, 137, 201, 0.3);
    }

    .related-btn:hover i {
      transform: translateX(5px);
    }

    /* ============================================
     RESPONSIVE DESIGN
     ============================================ */
    @media (max-width: 1100px) {
      .course-details-grid {
        gap: 30px;
      }
    }

    @media (max-width: 992px) {
      .course-details-grid {
        grid-template-columns: 1fr;
      }

      .course-details-sidebar {
        position: static;
        max-width: 500px;
        margin: 0 auto;
      }

      .course-details-image img {
        height: 350px;
      }
    }

    @media (max-width: 768px) {
      .course-details-section {
        padding: 50px 20px;
      }

      .course-details-description,
      .course-curriculum {
        padding: 28px 20px;
      }

      .course-details-image img {
        height: 250px;
      }

      .course-details-description h2,
      .course-curriculum h2 {
        font-size: 1.5rem;
      }

      .course-details-description p {
        font-size: 0.95rem;
      }

      .curriculum-list li {
        padding: 12px 14px;
        font-size: 0.9rem;
      }

      .related-grid {
        gap: 25px;
      }

      .related-title {
        font-size: 1.8rem;
      }

      .course-info-card {
        padding: 24px;
      }

      .price-value {
        font-size: 2.5rem;
      }
    }

    @media (max-width: 480px) {
      .course-details-section {
        padding: 40px 15px;
      }

      .course-details-description h2,
      .course-curriculum h2 {
        font-size: 1.3rem;
      }

      .curriculum-list li {
        padding: 10px 12px;
        gap: 12px;
      }

      .related-card-content h3 {
        font-size: 1.1rem;
      }

      .related-btn {
        padding: 10px 24px;
        font-size: 0.9rem;
      }
    }

    /* ============================================
     ANIMATIONS
     ============================================ */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .course-details-main,
    .course-info-card {
      animation: fadeInUp 0.6s ease forwards;
    }

    .course-info-card {
      animation-delay: 0.1s;
    }

    .related-card {
      animation: fadeInUp 0.5s ease forwards;
      animation-delay: calc(var(--i, 0) * 0.1s);
    }

    .related-card:nth-child(1) {
      --i: 1;
    }

    .related-card:nth-child(2) {
      --i: 2;
    }

    .related-card:nth-child(3) {
      --i: 3;
    }
  </style>
@endpush

@push('scripts')
  <script src="{{ asset('front_assets/js/course.js') }}"></script>
@endpush

@section('content')

  <!-- ========================
       COURSE HEADER SECTION
  ========================= -->
  <div class="about-header-wrapper">
    <!-- Background Image -->
    <img src="{{ asset('front_assets/images/banner7.avif') }}" alt="Course Background" class="about-header-bg">

    <!-- Overlay -->
    <div class="about-header-overlay"></div>

    <!-- Back Button -->
    <a href="{{ URL::to('/courses') }}" class="back-btn">
      <i class="fas fa-arrow-left"></i> Back to Courses
    </a>

    <!-- Breadcrumb -->


    <!-- Centered Content -->
    <div class="about-header">
      <h1 class="about-header__title">{{ $course->name }}</h1>
      <p class="about-header__subtitle">
        {{ $course->short_description }}
      </p>
    </div>
  </div>

  <!-- ========================
       COURSE DETAILS SECTION
  ========================= -->
  <section class="course-details-section">
    <div class="course-details-container">
      <div class="course-details-grid">
        <!-- Left Column: Main Content -->
        <div class="course-details-main">
          <div class="course-details-image">
            <img src="{{ asset('front_assets/images/' . $course->image) }}" alt="{{ $course->name }}">
          </div>

          <div class="course-details-description">
            <h2>Course Overview</h2>
            <p>{{ $course->full_description }}</p>
          </div>

          <div class="course-curriculum">
            <h2>Curriculum</h2>
            <ul class="curriculum-list">
              @foreach($course->modules as $module)
                <li><i class="fas fa-check-circle"></i> {{ $module }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <!-- Right Column: Sidebar -->
        <div class="course-details-sidebar">
          <div class="course-info-card">
            <div class="course-price">
              <span class="price-label">Course Price</span>
              <span class="price-value">${{ $course->price }}</span>
            </div>

            <div class="course-info-item">
              <i class="fas fa-clock"></i>
              <div>
                <strong>Duration</strong>
                <p>{{ $course->duration }}</p>
              </div>
            </div>

            <div class="course-info-item">
              <i class="fas fa-users"></i>
              <div>
                <strong>Level</strong>
                <p>{{ $course->level }}</p>
              </div>
            </div>

            <div class="course-info-item">
              <i class="fas fa-certificate"></i>
              <div>
                <strong>Certificate</strong>
                <p>Certificate of Completion</p>
              </div>
            </div>

            <div class="course-info-item">
              <i class="fas fa-language"></i>
              <div>
                <strong>Language</strong>
                <p>English</p>
              </div>
            </div>

            <div class="course-info-item">
              <i class="fas fa-video"></i>
              <div>
                <strong>Mode</strong>
                <p>Online / Offline</p>
              </div>
            </div>

            <button class="enroll-btn" onclick="window.location.href='{{ route('course.enroll', $course->id) }}'">
              <i class="fas fa-graduation-cap"></i> Enroll Now
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================
       RELATED COURSES SECTION
  ========================= -->
  @if(count($relatedCourses) > 0)
    <section class="related-courses">
      <div class="related-courses-container">
        <h2 class="related-title">You May Also Like</h2>
        <div class="related-grid">
          @foreach($relatedCourses as $relCourse)
            <div class="related-card">
              <img src="{{ asset('front_assets/images/' . $relCourse['image']) }}" alt="{{ $relCourse['name'] }}">
              <div class="related-card-content">
                <h3>{{ $relCourse['name'] }}</h3>
                <p class="related-price">${{ $relCourse['price'] }}</p>
                <a href="{{ route('course.detail', $relCourse['id']) }}" class="related-btn">View Course <i
                    class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif


@endsection