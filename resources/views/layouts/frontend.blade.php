<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets-front/img-main.png') }}">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('resources/css/common.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Amarna:ital,wght@0,100..700;1,100..700&family=Glory:ital,wght@0,100..800;1,100..800&family=Marcellus&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>
<body>
<!-- navbar -->
 <!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-color fixed-top">
  <div class="container position-relative">

    <a class="navbar-brand" href="{{URL::to('https://skorasoft.com')}}">
      <img src="{{ asset('resources/images/logo-skora.png') }}" alt="skorasoft">
    </a>
<button><i class="fa-regular fa-headphones"></i>Support</button>
    <button><i class="fa-regular fa-address-book"></i> Contact Us</button>


    <!-- Menu Button -->
    <button class="sidebar-float-btn"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#sideNav">
      <i class="fa-solid fa-bars"></i>
    </button>

  </div>
</nav>


<!-- RIGHT SIDE NAV -->
<div class="offcanvas offcanvas-end custom-sidenav" id="sideNav">

  <div class="offcanvas-header">
    <img src="{{ asset('resources/images/logo-skora.png') }}" alt="skorasoft">
    <button class="btn-close btn-close-black"
      data-bs-dismiss="offcanvas"></button>
  </div>

  <h5 class="menu-title">Explore SkoraSoft</h5>
<hr>
  <div class="offcanvas-body">

    <ul class="side-links">
      <li><a href="{{URL::to('/')}}"><i class="fa-solid fa-house"></i> Home</a></li>
      <li><a href="{{URL::to('/company')}}"><i class="fa-solid fa-building"></i> Company</a></li>
      <li><a href="{{URL::to('/services')}}"><i class="fa-solid fa-gears"></i> Services</a></li>
      <li><a href="{{URL::to('/news&blogs')}}"><i class="fa-solid fa-newspaper"></i> News & Blogs</a></li>
      <li><a href="{{URL::to('/career')}}"><i class="fa-solid fa-briefcase"></i> Career</a></li>
      <li><a href="{{URL::to('/specialization')}}"><i class="fa-solid fa-user"></i> Specialization</a></li>
      <li><a href="{{URL::to('/contact')}}"><i class="fa-solid fa-envelope"></i> Contact</a></li>
    </ul>

    <div class="social-box">
      <h6>Let's Connect</h6>

      <div class="social-icons">
        <a href="{{URL::to('https://www.linkedin.com')}}"><i class="fa-brands fa-linkedin"></i></a>
        <a href="{{URL::to('https://www.instagram.com')}}"><i class="fa-brands fa-instagram"></i></a>
        <a href="{{URL::to('https://www.facebook.com')}}"><i class="fa-brands fa-facebook"></i></a>
        <a href="{{URL::to('https://www.twitter.com')}}"><i class="fa-brands fa-twitter"></i></a>
        <a href="{{URL::to('https://www.whatsapp.com')}}"><i class="fa-brands fa-whatsapp"></i></a>
      </div>
    </div>

  </div>
</div>



<!-- WhatsApp Floating Button -->
<div class="whatsapp-container">

  <!-- Popup Message -->
  <div class="whatsapp-popup" id="whatsappPopup">
    <p>👋 Hi! Need help?<br>Chat with us on WhatsApp.</p>
    <a href="{{URL::to('https://www.whatsapp.com')}}" target="_blank">
      Chat Now
    </a>
  </div>

  <!-- WhatsApp Button -->
  <button class="whatsapp-btn" id="whatsappBtn">
    <i class="fa-brands fa-whatsapp"></i>
  </button>


  <!-- SOCIAL FLOATING POPUP -->
<div class="social-widget">

  <!-- MAIN BUTTON -->
  <div class="social-toggle" onclick="toggleSocial()">
    <i class="fas fa-share-alt"></i>
  </div>

  <!-- SOCIAL ICONS -->

  <a href="{{URL::to('https://www.instagram.com')}}" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
  <a href="{{URL::to('https://www.facebook.com')}}" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
  <a href="{{URL::to('https://www.twitter.com')}}" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
  <a href="{{URL::to('https://www.pinterest.com')}}" class="social-icon pinterest"><i class="fab fa-pinterest-p"></i></a>
  <a href="{{URL::to('https://www.linkedin.com')}}" class="social-icon linkedin"><i class="fab fa-linkedin-in"></i></a>

</div>
</div>
<!-- Cursor Glow -->
<div class="cursor-glow"></div>
<!-- main content -->
    @yield('content')


    <!-- footer -->
     <footer class="agency-footer">

  <div class="footer-wrapper">

<!-- footer top center -->

<div class="footertop">
  <p>Work With Us

</p>
<h4>We would love to hear more about your project</h4>

      <a href="#" class="footer-btn">
       Get In Touch
      </a>
</div>

    <!-- LEFT SIDE -->
    <div class="footer-left">
      <p class="small-text">Ready To Do This?</p>

      <h1 class="coffee-title">
        Let's Have a <br> Coffee
      </h1>

      <a href="#" class="footer-btn">
        Schedule An Appointment →
      </a>

      <div class="contact-info">
        <p>OR</p>
        <p>Call Us: +91 7033313450</p>
        <p>Email Us: info@skorasoft.com</p>
      </div>
    </div>

    <!-- CENTER LINKS -->
    <div class="footer-links-area">

      <div class="footer-col">
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Career</a>
        <a href="#">Blogs</a>
        <a href="#">Contact</a>
      </div>

      <div class="footer-col">
        <a href="#">Company Profile</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Condition</a>
        <a href="#">Refund Policy</a>
        <a href="#">Pricing</a>
      </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="footer-right">

      <div class="vertical-text">Let's Talk</div>
<div class="social-s">

  <a href="#" class="s-item s1">
    <i class="fab fa-instagram"></i>
  </a>

  <a href="#" class="s-item s2">
    <i class="fab fa-linkedin-in"></i>
  </a>

  <a href="#" class="s-item s3">
    <i class="fab fa-pinterest-p"></i>
  </a>

  <a href="#" class="s-item s4">
    <i class="fab fa-facebook-f"></i>
  </a>

  <a href="#" class="s-item s5">
    <i class="fab fa-twitter"></i>
  </a>

  <a href="#" class="s-item s6">
    <i class="fab fa-whatsapp"></i>
  </a>

</div>

    </div>

  </div>

  <div class="footer-bottom">
    © Copyright 2026 SkoraSoft. All rights reserved.
  </div>

</footer>

    <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/js/common.js') }}"></script>
    @stack('scripts')

</body>

</html>
