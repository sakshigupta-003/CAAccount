<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="icon" type="image/png" href="{{ asset('front_assets/images/logo.png') }}">
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
      <img src="{{ asset('front_assets/images/logo.png') }}" alt="Account Logo">
    </a>

    <!-- DESKTOP MENU -->
    <ul class="nav-links">
      <li><a href="{{ URL::to('/') }}"><i class="fa-solid fa-house"></i> Home</a></li>
      <li><a href="{{ URL::to('/about') }}"><i class="fa-solid fa-user"></i> About Us</a></li>
      <li><a href="{{ URL::to('/services') }}"><i class="fa-solid fa-bag-shopping"></i> Services</a></li>
      <li><a href="{{ URL::to('/courses') }}"><i class="fa-solid fa-graduation-cap"></i> Courses</a></li>
    </ul>

    <!-- RIGHT BUTTONS -->
    <div class="nav-right">
      <a href="{{ URL::to('/contact') }}" class="contact-btn">
        <i class="fa-solid fa-phone"></i> <span>Contact Us</span>
      </a>
      <!-- MOBILE TOGGLE -->
      <button class="mobile-toggle" id="menuOpenBtn">
        <i class="fa-solid fa-bars"></i>
      </button>
    </div>
  </div>
</nav>

<!-- MOBILE SIDEBAR -->
<div class="sidebar" id="sidebar">
  <div class="mobile-navbar-header">
    <div class="mobile-logo-wrapper">
      <div class="mobile-navbar-logo">
        <img src="{{ asset('front_assets/images/logo.png') }}" alt="Logo">
      </div>
    </div>
    <button class="close-sidebar" id="closeSidebarBtn" aria-label="Close menu">✕</button>
  </div>

  <!-- MOBILE LINKS -->
  <ul class="mobile-links">
    <li><a href="{{ URL::to('/') }}"><i class="fa-solid fa-house"></i> Home</a></li>
    <li><a href="{{ URL::to('/about') }}"><i class="fa-solid fa-user"></i> About Us</a></li>
    <li><a href="{{ URL::to('/services') }}"><i class="fa-solid fa-bag-shopping"></i> Services</a></li>
 <li><a href="{{ URL::to('/courses') }}"><i class="fa-solid fa-graduation-cap"></i> Courses</a></li>   
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

  <!-- Social Footer -->
  <div class="social-footer">
    <a href="https://www.facebook.com/share/1CjKpu3mD1/" target="_blank" rel="noopener noreferrer" class="facebook">
      <i class="fab fa-facebook-f"></i>
    </a>
    <a href="https://www.instagram.com/easetoloan?igsh=MWJlNmxlOGpsNjg1dw%3D%3D" target="_blank" rel="noopener noreferrer" class="instagram">
      <i class="fab fa-instagram"></i>
    </a>
    <a href="https://www.linkedin.com/company/easetoloan" target="_blank" rel="noopener noreferrer" class="linkedin">
      <i class="fab fa-linkedin-in"></i>
    </a>
    <a href="https://twitter.com/EaseToLoan" target="_blank" rel="noopener noreferrer" class="twitter">
      <i class="fab fa-twitter"></i>
    </a>
    <a href="https://wa.me/919876543210" target="_blank" rel="noopener noreferrer" class="whatsapp">
      <i class="fab fa-whatsapp"></i>
    </a>
  </div>
</div>

<!-- OVERLAY -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>


  <!-- main content -->
  @yield('content')

<!-- =========================
     PROFESSIONAL FOOTER WITH REAL BRAND SOCIAL COLORS
========================= -->
<footer class="main-footer">
  <div class="container">
    <div class="footer-top">
      <!-- FOOTER LOGO -->
      <div class="footer-about">
        <a class="navbar-logo" href="{{ URL::to('/') }}">
          <img src="{{ asset('front_assets/images/logo.png') }}" alt="Account">
        </a>
        <p>
          Account is a professional accounting and training platform
          providing expert CA services, finance solutions, taxation,
          and industry-ready courses for students and businesses.
        </p>
        <div class="footer-social">
          <a href="https://www.facebook.com/share/1CjKpu3mD1/" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://www.instagram.com/easetoloan?igsh=MWJlNmxlOGpsNjg1dw%3D%3D" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://www.linkedin.com/company/easetoloan" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="https://twitter.com/EaseToLoan" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="https://wa.me/919876543210" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-whatsapp"></i>
          </a>
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
          <li><a href="#">GST Filing</a></li>
          <li><a href="#">Income Tax</a></li>
          <li><a href="#">Company Registration</a></li>
          <li><a href="#">Audit Services</a></li>
          <li><a href="#">Business Consultancy</a></li>
        </ul>
      </div>

      <!-- COURSES -->
      <div class="footer-links">
        <h4>Courses</h4>
        <ul>
          <li><a href="#">Tally Prime</a></li>
          <li><a href="#">GST Course</a></li>
          <li><a href="#">Advanced Excel</a></li>
          <li><a href="#">Accounting Training</a></li>
          <li><a href="#">Taxation Course</a></li>
        </ul>
      </div>

      <!-- CONTACT -->
      <div class="footer-contact">
        <h4>Contact Info</h4>
        <p>
          <i class="fas fa-phone-alt"></i>
          <a href="tel:+919217354577">+91 9217354577</a>
        </p>
        <p>
          <i class="fas fa-phone-alt"></i>
          <a href="tel:+919876543210">+91 9876543210</a>
        </p>
        <p>
          <i class="fas fa-envelope"></i>
          <a href="mailto:info@caaccount.com">info@caaccount.com</a>
        </p>
        <p>
          <i class="fas fa-map-marker-alt"></i>
          <a href="https://maps.google.com/?q=123+Financial+District">1125-26 i-thum towers-b , pilot No-A40,
            Sector-62, noida, Noida, Uttar Pradesh 201301</a>
        </p>
      </div>
    </div>
  </div>

  <!-- COPYRIGHT -->
  <div class="footer-bottom">
    <div class="container">
      <p>© 2026 Accountech. All Rights Reserved. | Designed with <i class="fas fa-heart" style="color: var(--primary-light); font-size: 0.7rem;"></i> for excellence</p>
    </div>
  </div>
</footer>

  <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('front_assets/js/common.js') }}"></script>
  @stack('scripts')

</body>

</html>