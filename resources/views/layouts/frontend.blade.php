<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets-front/img-main.png') }}">
  @stack('styles')
  <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('front_assets/css/common.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  <link
    href="https://fonts.googleapis.com/css2?family=Amarna:ital,wght@0,100..700;1,100..700&family=Glory:ital,wght@0,100..800;1,100..800&family=Marcellus&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
</head>

<body>
  <!-- PROFESSIONAL NAVBAR -->
  <nav class="custom-navbar fixed-top">

    <div class="container">

      <!-- LOGO -->
      <a class="navbar-logo" href="{{ URL::to('/') }}">
        <img src="{{ asset('front_assets/images/mainlogo.jpeg') }}" alt="Accountech">

      </a>

      <!-- DESKTOP MENU -->
      <ul class="nav-links">
        <li><a href="{{ URL::to('/') }}"><i class="fa-solid fa-house"></i> Home</a></li>
        <li><a href="{{ URL::to('/about') }}"><i class="fa-solid fa-user"></i> About</a></li>
        <li><a href="{{ URL::to('/courses') }}"><i class="fa-solid fa-graduation-cap"></i> Courses</a></li>
        <li><a href="{{ URL::to('/services') }}"> <i class="fa-solid fa-bag-shopping"></i> Services</a></li>
      </ul>

      <!-- RIGHT BUTTONS -->
      <div class="nav-right">
        <a href="{{ URL::to('/contact') }}" class="contact-btn">
          <i class="fa-solid fa-phone"></i> Contact Us
        </a>

        <!-- MOBILE TOGGLE -->
        <button class="mobile-toggle" id="menuOpenBtn">
          <i class="fa-solid fa-bars"></i>
        </button>

      </div>

    </div>

  </nav>

  <!-- MOBILE SIDEBAR -->
  <div class="mobile-sidebar" id="mobileSidebar">
    <!-- CLOSE BUTTON -->
    <button class="close-sidebar" id="menuCloseBtn">
      <i class="fa-solid fa-xmark"></i>
    </button>

    <!-- LOGO -->
    <div class="mobile-logo-wrapper">
      <a class="mobile-navbar-logo" href="{{ URL::to('/') }}">
        <img src="{{ asset('front_assets/images/mainlogo.jpeg') }}" alt="Accountech">

      </a>
    </div>

    <!-- MOBILE LINKS -->
    <ul class="mobile-links">
      <li><a href="{{ URL::to('/') }}">Home</a></li>
      <li><a href="{{ URL::to('/about') }}">About</a></li>
      <li><a href="{{ URL::to('/courses') }}">Courses</a></li>
      <li><a href="{{ URL::to('/services') }}">Services</a></li>
    </ul>

    <!-- Buttons -->
    <div class="mobile-buttons">
      <a href="{{ URL::to('/contact') }}" class="support-btn">
        <i class="fa-solid fa-headset"></i> Support
      </a>
      <a href="{{ URL::to('/contact') }}" class="contact-btn">
        Contact Us
      </a>
    </div>

    <!-- Social Icons -->
    <div class="footer-social">
      <a href="https://www.facebook.com/share/1CjKpu3mD1/"><i class="fab fa-facebook-f"></i></a>
      <a href="https://www.instagram.com/easetoloan?igsh=MWJlNmxlOGpsNjg1dw%3D%3D"><i class="fab fa-instagram"></i></a>
      <a href="https://www.linkedin.com/company/easetoloan"><i class="fab fa-linkedin-in"></i></a>
      <a href="https://twitter.com/EaseToLoan"><i class="fab fa-twitter"></i></a>
      <a href="https://wa.me/919876543210"><i class="fab fa-whatsapp"></i></a>
    </div>
  </div>
  <!-- OVERLAY -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <!-- main content -->
  @yield('content')

  <!-- =========================
        PROFESSIONAL FOOTER
========================= -->

  <footer class="main-footer">

    <div class="container">

      <div class="footer-top">

        <!-- FOOTER LOGO -->
        <div class="footer-about">

          <a class="navbar-logo" href="{{ URL::to('/') }}">
            <img src="{{ asset('front_assets/images/mainlogo.jpeg') }}" alt="Accountech">

          </a>
          <p>
            Accountech is a professional accounting and training platform
            providing expert CA services, finance solutions, taxation,
            and industry-ready courses for students and businesses.
          </p>

          <div class="footer-social">

            <a href="https://www.facebook.com/share/1CjKpu3mD1/"><i class="fab fa-facebook-f"></i></a>

            <a href="https://www.instagram.com/easetoloan?igsh=MWJlNmxlOGpsNjg1dw%3D%3D"><i
                class="fab fa-instagram"></i></a>

            <a href="https://www.linkedin.com/company/easetoloan"><i class="fab fa-linkedin-in"></i></a>

            <a href="https://twitter.com/EaseToLoan"><i class="fab fa-twitter"></i></a>

            <a href="https://wa.me/919876543210"><i class="fab fa-whatsapp"></i></a>

          </div>

        </div>

        <!-- QUICK LINKS -->
        <div class="footer-links">

          <h4>Quick Links</h4>

          <ul>
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            <li><a href="{{ URL::to('/about') }}">About Us</a></li>
            <li><a href="{{ URL::to('/services') }}">Services</a></li>
            <li><a href="{{ URL::to('/courses') }}">Courses</a></li>
            <li><a href="{{ URL::to('/contact') }}">Contact</a></li>
          </ul>

        </div>

        <!-- SERVICES -->
        <div class="footer-links">

          <h4>Our Services</h4>

          <ul>
            <li><a href="{{ route('service.detail', 5) }}">GST Filing</a></li>
            <li><a href="{{ route('service.detail', 2) }}">Income Tax</a></li>
            <li><a href="{{ route('service.detail', 6) }}">Company Registration</a></li>
            <li><a href="{{ route('service.detail', 1) }}">Audit Services</a></li>
            <li><a href="{{ route('service.detail', 4) }}">Business Consultancy</a></li>
          </ul>

        </div>

        <!-- COURSES -->
        <div class="footer-links">

          <h4>Courses</h4>

          <ul>
            <li><a href="{{ route('course.detail', 1) }}">Tally Prime</a></li>
            <li><a href="{{ route('course.detail', 2) }}">GST Course</a></li>
            <li><a href="{{ route('course.detail', 3) }}">Advanced Excel</a></li>
            <li><a href="{{ route('course.detail', 4) }}">Accounting Training</a></li>
            <li><a href="{{ route('course.detail', 5) }}">Taxation Course</a></li>
          </ul>

        </div>

        <!-- CONTACT -->
        <div class="footer-contact">

          <h4>Contact Info</h4>

          <p>
            <i class="fas fa-phone-alt"></i>
            +91 9217354577
          </p>

          <p>
            <i class="fas fa-envelope"></i>
            info@accountech.com
          </p>

          <p>
            <i class="fas fa-map-marker-alt"></i>
            1125-26 i-thum towers-b , pilot No-A40, Sector-62, noida, Noida, Uttar Pradesh 201301
          </p>

        </div>

      </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="footer-bottom">

      <div class="container">

        <p>
          © 2026 Accountech. All Rights Reserved.
        </p>

      </div>

    </div>

  </footer>

  <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('front_assets/js/common.js') }}"></script>
  @stack('scripts')

</body>

</html>