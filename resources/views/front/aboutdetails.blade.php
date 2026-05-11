@extends('layouts.frontend')
@section('title', isset($about) ? $about->name . ' || Accountech' : 'About Details || Accountech')

@push('styles')
<link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
<style>
/* ============================================
   ABOUT DETAILS PAGE - PROFESSIONAL CSS
   ============================================ */

/* About Details Section */
.about-details-section {
    padding: 80px 20px;
    background: linear-gradient(145deg, #f8fafc 0%, #eef2f9 100%);
    position: relative;
}

.about-details-container {
    max-width: 1280px;
    margin: 0 auto;
}

.about-details-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 40px;
}

/* Main Content Card */
.about-details-main {
    background: #ffffff;
    border-radius: 32px;
    overflow: hidden;
    box-shadow: 0 30px 50px -20px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease;
}

.about-details-main:hover {
    transform: translateY(-5px);
}

.about-details-image {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #0a2540, #0f3b5c);
}

.about-details-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    transition: transform 0.7s ease;
}

.about-details-image:hover img {
    transform: scale(1.05);
}

.about-details-image::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100px;
    background: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
}

/* Category Badge */
.category-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, rgb(19, 137, 201), #0f53ab);
    color: white;
    padding: 8px 20px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.85rem;
    z-index: 2;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* Content Area */
.about-details-content {
    padding: 40px 36px;
}

.about-details-content h2 {
    font-size: 1.8rem;
    font-weight: 800;
    color: #0a2540;
    margin-bottom: 24px;
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 12px;
}

.about-details-content h2 i {
    color: rgb(19, 137, 201);
    font-size: 1.8rem;
}

.about-details-content h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 70px;
    height: 4px;
    background: linear-gradient(90deg, rgb(19, 137, 201), #60a5fa);
    border-radius: 4px;
}

.about-details-content p {
    color: #475569;
    line-height: 1.85;
    font-size: 1.05rem;
    margin-bottom: 20px;
}

.about-details-content ul {
    margin: 20px 0;
    padding-left: 20px;
    list-style: none;
}

.about-details-content ul li {
    color: #475569;
    line-height: 1.8;
    font-size: 1rem;
    margin-bottom: 12px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.about-details-content ul li strong {
    color: #0a2540;
}

.about-details-content ul li::before {
    content: '\f00c';
    font-family: 'Font Awesome 6 Free';
    font-weight: 600;
    color: rgb(19, 137, 201);
    margin-top: 2px;
}

/* Sidebar */
.about-details-sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.about-info-card {
    background: #ffffff;
    border-radius: 28px;
    padding: 28px;
    box-shadow: 0 25px 45px -15px rgba(0, 0, 0, 0.12);
    border: 1px solid rgba(19, 137, 201, 0.15);
    transition: transform 0.3s ease;
}

.about-info-card:hover {
    transform: translateY(-5px);
}

/* Meta Items */
.meta-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 0;
    border-bottom: 1px solid #f1f5f9;
    transition: all 0.3s ease;
}

.meta-item i {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, rgba(19, 137, 201, 0.12), rgba(19, 137, 201, 0.06));
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgb(19, 137, 201);
    font-size: 1.3rem;
}

.meta-item strong {
    display: block;
    font-size: 0.75rem;
    color: #6c7a91;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.meta-item p {
    font-size: 1rem;
    font-weight: 700;
    color: #0a2540;
    margin: 0;
    margin-top: 4px;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 20px;
}

.share-btn, .contact-btn-action {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 14px 20px;
    border-radius: 60px;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
    cursor: pointer;
}

.share-btn {
    background: transparent;
    border: 2px solid rgb(19, 137, 201);
    color: rgb(19, 137, 201);
}

.share-btn:hover {
    background: rgb(19, 137, 201);
    color: white;
    gap: 14px;
}

.contact-btn-action {
    background: linear-gradient(135deg, rgb(19, 137, 201), #0f53ab);
    border: none;
    color: white;
    box-shadow: 0 6px 14px rgba(19, 137, 201, 0.25);
}

.contact-btn-action:hover {
    transform: translateY(-2px);
    gap: 14px;
    box-shadow: 0 10px 20px rgba(19, 137, 201, 0.35);
}

/* Related Content */
.related-content {
    padding: 60px 20px 80px;
    background: #ffffff;
}

.related-content-container {
    max-width: 1280px;
    margin: 0 auto;
}

.related-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 800;
    color: #0a2540;
    margin-bottom: 45px;
    position: relative;
}

.related-title::after {
    content: '';
    position: absolute;
    bottom: -12px;
    left: 50%;
    transform: translateX(-50%);
    width: 70px;
    height: 4px;
    background: linear-gradient(90deg, rgb(19, 137, 201), #60a5fa);
    border-radius: 4px;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
}

.related-item {
    background: #ffffff;
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid #eef2f6;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
}

.related-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 35px -12px rgba(19, 137, 201, 0.15);
}

.related-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s;
}

.related-item:hover img {
    transform: scale(1.05);
}

.related-item-content {
    padding: 22px;
    text-align: center;
}

.related-item-content h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0a2540;
    margin-bottom: 5px;
}

.related-category {
    color: rgb(19, 137, 201);
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.related-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: transparent;
    border: 2px solid rgb(19, 137, 201);
    color: rgb(19, 137, 201);
    padding: 10px 28px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.related-btn:hover {
    background: rgb(19, 137, 201);
    color: white;
    gap: 15px;
    transform: translateX(5px);
}

/* Responsive */
@media (max-width: 992px) {
    .about-details-grid {
        grid-template-columns: 1fr;
    }
    .about-details-sidebar {
        position: static;
    }
}

@media (max-width: 768px) {
    .about-details-section {
        padding: 50px 20px;
    }
    .about-details-image img {
        height: 280px;
    }
    .about-details-content h2 {
        font-size: 1.5rem;
    }
    .about-details-content {
        padding: 28px 20px;
    }
    .category-badge {
        top: 15px;
        right: 15px;
        font-size: 0.75rem;
        padding: 6px 14px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Share functionality
    const shareBtn = document.getElementById('shareBtn');
    if (shareBtn) {
        shareBtn.addEventListener('click', function() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $about->name }}',
                    text: '{{ $about->short_description }}',
                    url: window.location.href
                }).catch(console.log);
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(window.location.href);
                alert('Link copied to clipboard!');
            }
        });
    }
});
</script>
@endpush

@section('content')

<!-- ========================
     ABOUT HEADER SECTION
========================= -->
<div class="about-header-wrapper">
    <img src="{{ asset('front_assets/images/banner7.avif') }}" alt="About Background" class="about-header-bg">
    <div class="about-header-overlay"></div>
    
    <a href="{{ URL::to('/about') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Back to About
    </a>
    
    <div class="about-header">
        <h1 class="about-header__title">{{ $about->name }}</h1>
        <p class="about-header__subtitle">{{ $about->short_description }}</p>
    </div>
</div>

<!-- ========================
     ABOUT DETAILS SECTION
========================= -->
<section class="about-details-section">
    <div class="about-details-container">
        <div class="about-details-grid">
            <!-- Left Column: Main Content -->
            <div class="about-details-main">
                <div class="about-details-image">
                    <img src="{{ asset('front_assets/images/' . $about->image) }}" alt="{{ $about->name }}">
                    <div class="category-badge">
                        <i class="fas {{ $about->icon }}"></i> {{ $about->category }}
                    </div>
                </div>
                
                <div class="about-details-content">
                    <h2><i class="fas fa-info-circle"></i> {{ $about->name }}</h2>
                    {!! $about->full_description !!}
                </div>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="about-details-sidebar">
                <div class="about-info-card">
                    <div class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        <div>
                            <strong>Published Date</strong>
                            <p>{{ $about->date }}</p>
                        </div>
                    </div>
                    
                    <div class="meta-item">
                        <i class="fas fa-user"></i>
                        <div>
                            <strong>Author</strong>
                            <p>{{ $about->author }}</p>
                        </div>
                    </div>

                    <div class="meta-item">
                        <i class="fas fa-tag"></i>
                        <div>
                            <strong>Category</strong>
                            <p>{{ $about->category }}</p>
                        </div>
                    </div>

                    <div class="meta-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Reading Time</strong>
                            <p>{{ ceil(strlen(strip_tags($about->full_description)) / 1500) }} min read</p>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button class="share-btn" id="shareBtn">
                            <i class="fas fa-share-alt"></i> Share This Post
                        </button>
                        <a href="{{ route('contact') }}" class="contact-btn-action">
                            <i class="fas fa-envelope"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     RELATED CONTENT SECTION
========================= -->
@if(count($relatedContents) > 0)
<section class="related-content">
    <div class="related-content-container">
        <h2 class="related-title">You May Also Like</h2>
        <div class="related-grid">
            @foreach($relatedContents as $relContent)
            <div class="related-item">
                <img src="{{ asset('front_assets/images/' . $relContent['image']) }}" alt="{{ $relContent['name'] }}">
                <div class="related-item-content">
                    <h3>{{ $relContent['name'] }}</h3>
                    <p class="related-category"><i class="fas {{ $relContent['icon'] }}"></i> {{ $relContent['category'] }}</p>
                    <a href="{{ route('about.detail', $relContent['id']) }}" class="related-btn">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection