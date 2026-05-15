@extends('layouts.frontend')
@section('title', isset($service) ? $service->name . ' || Accountech' : 'Service Details || Accountech')

@push('styles')
    <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
    <style>
        /* ============================================
       SERVICE DETAILS PAGE - PROFESSIONAL CSS
       ============================================ */

        /* Service Details Section */
        .service-details-section {
            padding: 80px 20px;
            background: linear-gradient(145deg, #f8fafc 0%, #eef2f9 100%);
            position: relative;
        }

        .service-details-container {
            max-width: 1280px;
            margin: 0 auto;
        }

        .service-details-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 40px;
        }

        /* Main Content Card */
        .service-details-main {
            background: #ffffff;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 30px 50px -20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .service-details-main:hover {
            transform: translateY(-5px);
        }

        .service-details-image {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0a2540, #0f3b5c);
        }

        .service-details-image img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .service-details-image:hover img {
            transform: scale(1.05);
        }

        .service-details-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);
        }

        /* Service Badge */
        .service-badge {
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
        }

        /* Description & Features */
        .service-details-description,
        .service-features {
            padding: 40px 36px;
            border-bottom: 1px solid #eef2f6;
        }

        .service-details-description h2,
        .service-features h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0a2540;
            margin-bottom: 24px;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .service-details-description h2 i,
        .service-features h2 i {
            color: rgb(19, 137, 201);
            font-size: 1.8rem;
        }

        .service-details-description h2::after,
        .service-features h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, rgb(19, 137, 201), #60a5fa);
            border-radius: 4px;
        }

        .service-details-description p {
            color: #475569;
            line-height: 1.85;
            font-size: 1.05rem;
            margin-top: 20px;
            text-align: justify;
        }

        /* Features List */
        .features-list {
            list-style: none;
            padding: 0;
            margin-top: 25px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .features-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background: #f8fafc;
            border-radius: 12px;
            color: #334155;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .features-list li i {
            color: rgb(19, 137, 201);
            font-size: 1.1rem;
            width: 24px;
        }

        .features-list li:hover {
            background: linear-gradient(135deg, #f0f9ff, #e6f0fa);
            transform: translateX(5px);
        }

        /* Sidebar */
        .service-details-sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .service-info-card {
            background: #ffffff;
            border-radius: 28px;
            padding: 32px;
            box-shadow: 0 25px 45px -15px rgba(0, 0, 0, 0.12);
            border: 1px solid rgba(19, 137, 201, 0.15);
            transition: transform 0.3s ease;
        }

        .service-info-card:hover {
            transform: translateY(-5px);
        }

        /* Price Section */
        .service-price {
            text-align: center;
            padding-bottom: 25px;
            margin-bottom: 25px;
            border-bottom: 2px dashed #eef2f6;
        }

        .price-label {
            display: block;
            font-size: 0.85rem;
            color: #5a6e8a;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .price-value {
            font-size: 3.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, rgb(19, 137, 201), #0f53ab);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Info Items */
        .service-info-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        .service-info-item:hover {
            background: #f8fafc;
            padding-left: 12px;
            border-radius: 12px;
        }

        .service-info-item i {
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

        .service-info-item strong {
            display: block;
            font-size: 0.75rem;
            color: #6c7a91;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .service-info-item p {
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
            padding: 16px 20px;
            border-radius: 60px;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 25px;
        }

        .enroll-btn:hover {
            transform: translateY(-3px);
            gap: 16px;
            box-shadow: 0 10px 25px rgba(19, 137, 201, 0.3);
        }

        /* Related Services */
        .related-services {
            padding: 60px 20px 80px;
            background: #ffffff;
        }

        .related-services-container {
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
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .related-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s ease;
            border: 1px solid #eef2f6;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        }

        .related-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 35px -12px rgba(19, 137, 201, 0.15);
        }

        .related-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .related-card:hover img {
            transform: scale(1.05);
        }

        .related-card-content {
            padding: 22px;
            text-align: center;
        }

        .related-card-content h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0a2540;
            margin-bottom: 8px;
        }

        .related-price {
            color: rgb(19, 137, 201);
            font-weight: 800;
            font-size: 1.3rem;
            margin-bottom: 18px;
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
            .service-details-grid {
                grid-template-columns: 1fr;
            }

            .service-details-sidebar {
                position: static;
            }

            .features-list {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .service-details-section {
                padding: 50px 20px;
            }

            .service-details-image img {
                height: 280px;
            }

            .service-details-description h2,
            .service-features h2 {
                font-size: 1.5rem;
            }

            .service-details-description,
            .service-features {
                padding: 28px 20px;
            }

            .price-value {
                font-size: 2.5rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('front_assets/js/course.js') }}"></script>
@endpush

@section('content')

    <!-- ========================
         SERVICE HEADER SECTION
    ========================= -->
    <div class="about-header-wrapper">
        <img src="{{ asset('front_assets/images/banner7.avif') }}" alt="Service Background" class="about-header-bg">
        <div class="about-header-overlay"></div>

        <a href="{{ URL::to('/services') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Services
        </a>

        <div class="about-header">
            <h1 class="about-header__title">{{ $service->name }}</h1>
            <p class="about-header__subtitle">{{ $service->short_description }}</p>
        </div>
    </div>

    <!-- ========================
         SERVICE DETAILS SECTION
    ========================= -->
    <section class="service-details-section">
        <div class="service-details-container">
            <div class="service-details-grid">
                <!-- Left Column -->
                <div class="service-details-main">
                    <div class="service-details-image">
                        <img src="{{ asset('front_assets/images/' . $service->image) }}" alt="{{ $service->name }}">
                        <div class="service-badge"><i class="fas {{ $service->icon }}"></i> Featured</div>
                    </div>

                    <div class="service-details-description">
                        <h2><i class="fas fa-info-circle"></i> Service Overview</h2>
                        <p>{{ $service->full_description }}</p>
                    </div>

                    <div class="service-features">
                        <h2><i class="fas fa-star"></i> What's Included</h2>
                        <ul class="features-list">
                            @foreach($service->features as $feature)
                                <li><i class="fas fa-check-circle"></i> {{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Right Column: Sidebar -->
                <div class="service-details-sidebar">
                    <div class="service-info-card">
                        <div class="service-price">
                            <span class="price-label">Starting From</span>
                            <span class="price-value">${{ $service->price }}</span>
                        </div>

                        <div class="service-info-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <strong>Estimated Time</strong>
                                <p>{{ $service->duration }}</p>
                            </div>
                        </div>

                        <div class="service-info-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <strong>Ideal For</strong>
                                <p>{{ $service->level }}</p>
                            </div>
                        </div>

                        <div class="service-info-item">
                            <i class="fas fa-certificate"></i>
                            <div>
                                <strong>Delivery</strong>
                                <p>Digital & Physical</p>
                            </div>
                        </div>

                        <div class="service-info-item">
                            <i class="fas fa-headset"></i>
                            <div>
                                <strong>Support</strong>
                                <p>24/7 Customer Support</p>
                            </div>
                        </div>

                        <button class="enroll-btn"
                            onclick="window.location.href='{{ route('service.enroll', $service->id) }}'">
                            <i class="fas fa-paper-plane"></i> Get Started Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
         RELATED SERVICES
    ========================= -->
    @if(count($relatedServices) > 0)
        <section class="related-services">
            <div class="related-services-container">
                <h2 class="related-title">You May Also Like</h2>
                <div class="related-grid">
                    @foreach($relatedServices as $relService)
                        <div class="related-card">
                            <img src="{{ asset('front_assets/images/' . $relService['image']) }}" alt="{{ $relService['name'] }}">
                            <div class="related-card-content">
                                <h3>{{ $relService['name'] }}</h3>
                                <p class="related-price">${{ $relService['price'] }}</p>
                                <a href="{{ route('service.detail', $relService['id']) }}" class="related-btn">View Service <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection