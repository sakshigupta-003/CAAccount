@extends('layouts.frontend')
@section('title','Accountech || Contact Us')
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
  <img 
    src="{{ asset('front_assets/images/banner7.avif') }}" 
    alt="About Us Background" 
    class="about-header-bg"
  >
  
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

  
  <div class="demo-content">
  <h2>Accountech – Financial Portal</h2>
  <p>New unread message indicator on the chat button (red badge). Open to mark as read.</p>
</div>

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
@endsection