@extends('layouts.app')

{{-- Meta Tags Dynamic --}}
@section('title', $settings->meta_title ?? 'Contact Us')
@section('meta_description', $settings->meta_description ?? '')
@section('meta_keywords', $settings->meta_keywords ?? '')
@section('content')

<div class="site-wrapper-reveal">

 <!--============ Resolutions Hero Start (No Swiper) ============-->
              @if($settings->is_hero_visible)
    <div class="hero-wrapper resolutions-hero-spaceall resolutions-hero-bg position-relative">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text mobile-fix">
                                <h1 class="font-weight--bold text-white mb-20 responsive-h1">
                                    {!! $settings->hero_heading ?? "Portland's Premier Glass Experts" !!}
                                </h1>
                                
                                <h4 class="text-white mb-30 responsive-h4">
                                    {!! $settings->hero_subheading ?? 'Woman-Owned | 20+ Years' !!}
                                </h4>

                                <div class="text text-white section-space--mt_20 mb-40 hero-description">
                                    {!! $settings->hero_description ?? 'From foggy window repairs to stunning custom shower enclosures...' !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 d-none d-md-block">
                        <div class="hero-image-side">
                            <img src="{{ $settings->hero_image ? asset($settings->hero_image) : asset('assets/images/gallery/about-1.png') }}" alt="Glass Craftsmanship" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    @else
        <div class="container" style="padding-top: 150px;">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title mb-10" style="font-weight: 700; color: #333;">Contact Us</h2>
                    <ul class="breadcrumb-list" style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 10px; font-size: 15px;">
                        <li><a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">Home</a></li>
                        <li style="color: #888;">></li>
                        <li style="color: #888;">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
@endif
            
            <!--============ Resolutions Hero End ============-->
            
            <div class="feature-icon-wrapper section-space--ptb_100">
        <div class="container">
            <div class="row">
                {{-- Contact Info Side --}}
                <div class="col-lg-4">
                    <h6 class="font-weight--bold mb-20 theme-color-text">{{ $settings->estimate_title }}</h6>
                    <p class="mb-0">{{ $settings->estimate_description }}</p>
                    
                    <div class="contact-info-wrapper mt-3">
                        {{-- Phone --}}
                        <div class="d-flex align-items-center mb-4 wow move-up">
                            <div class="icon-box-vertical me-4"><i class="fa fa-phone"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold">Call Us Anytime</h6>
                                <a href="tel:{{ $settings->phone }}" class="contact-link-text font-weight--bold" style="font-size: 1.2rem;">{{ $settings->phone }}</a>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="d-flex align-items-center mb-4 wow move-up">
                            <div class="icon-box-vertical me-4"><i class="fa fa-envelope"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold">Email Support</h6>
                                <a href="mailto:{{ $settings->email }}" class="contact-link-text">{{ $settings->email }}</a>
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="d-flex align-items-center mb-4 wow move-up">
                            <div class="icon-box-vertical me-4"><i class="fa fa-map-marker-alt"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold">Our Location</h6>
                                <span class="contact-link-text">{!! nl2br(e($settings->address)) !!}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Social Links --}}
                    <div class="social-links-wrap mt-5 wow move-up">
                        <h6 class="mb-3 fw-bold">{{ $settings->social_follow_text }}</h6>
                        <div class="d-flex">
                            @if($settings->facebook) <a href="{{ $settings->facebook }}" class="social-icon-box"><i class="fab fa-facebook-f"></i></a> @endif
                            @if($settings->instagram) <a href="{{ $settings->instagram }}" class="social-icon-box"><i class="fab fa-instagram"></i></a> @endif
                            @if($settings->twitter) <a href="{{ $settings->twitter }}" class="social-icon-box"><i class="fab fa-twitter"></i></a> @endif
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="col-lg-8 mt-5 mt-lg-0">
    <div class="contact-form-service-wrap-cont shadow-lg p-4 bg-white rounded wow move-up">
        <h3 class="form-title mb-3" style="font-size: 20px; font-weight: bold; color: #2F437E;">Let Us Call You</h3>
        
        <form action="{{ route('contact.send') }}" method="POST" class="tgp-main-form" id="main-contact-form">            @csrf
            
            <div class="form-group-radio mb-4">
                <label class="label-main font-weight--bold" style="font-size: 13px; margin-bottom: 10px; display: block; color: #555;">Service Type*</label>
                <div class="radio-flex d-flex flex-wrap gap-3">
                    @forelse($Pservices as $key => $service)
                        <label class="radio-item mb-0" style="font-size: 14px; cursor: pointer;">
                            <input type="radio" name="service_type" value="{{ $service->label }}" {{ $key == 0 ? 'checked' : '' }}> 
                            <span class="ms-1">{{ $service->label }}</span>
                        </label>
                    @empty
                        <label class="radio-item mb-0" style="font-size: 14px;">
                            <input type="radio" name="service_type" value="General Inquiry" checked> 
                            <span class="ms-1">General Inquiry</span>
                        </label>
                    @endforelse
                </div>
            </div>

            <div class="form-input-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                <div class="input-wrap">
                    <label style="font-size: 12px; font-weight: 600; color: #666;">First Name*</label>
                    <input type="text" name="first_name" class="form-control" placeholder="John" required style="padding: 10px; border: 1px solid #ddd;">
                </div>
                <div class="input-wrap">
                    <label style="font-size: 12px; font-weight: 600; color: #666;">Last Name*</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Smith" required style="padding: 10px; border: 1px solid #ddd;">
                </div>
                <div class="input-wrap">
                    <label style="font-size: 12px; font-weight: 600; color: #666;">Email*</label>
                    <input type="email" name="email" class="form-control" placeholder="email@example.com" required style="padding: 10px; border: 1px solid #ddd;">
                </div>
                <div class="input-wrap">
                    <label style="font-size: 12px; font-weight: 600; color: #666;">Phone Number*</label>
                    <input type="tel" name="phone" class="form-control" placeholder="(503) 000-0000" required style="padding: 10px; border: 1px solid #ddd;">
                </div>
                <div class="input-wrap">
                    <label style="font-size: 12px; font-weight: 600; color: #666;">ZIP Code*</label>
                    <input type="text" name="zip_code" class="form-control" placeholder="97124" required style="padding: 10px; border: 1px solid #ddd;">
                </div>
            </div>

            <div class="row mt-4 align-items-end">
                <div class="col-md-12 mb-3">
                    <div class="input-wrap mb-0">
                        <label style="font-size: 12px; font-weight: 600; color: #666;">Project Details*</label>
                        <textarea name="message" rows="2" class="form-control" placeholder="Brief details (e.g. Broken window in kitchen)..." required style="padding: 10px; border: 1px solid #ddd; resize: none;"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-end mt-3 mt-md-0">
                    <button type="submit" class="ht-btn ht-btn-md w-100" style="background-color: #2F437E; border: none; border-radius: 6px; height: 50px;">
                        Submit Now <i class="fa fa-paper-plane ms-1"></i>
                    </button>
                </div>
            </div>

            <div class="form-consent mt-3 text-center text-md-start">
                <small class="text-muted" style="font-size: 11px;">
                    By submitting, you agree to our <a href="{{ url('/terms-conditions') }}" style="color: #2F437E; text-decoration: underline;">Terms & Conditions</a>.
                </small>
            </div>
            <div id="form-response-msg"></div>
        </form>
    </div>
</div>
            </div>

            <div class="row section-space--pt_100">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="font-weight--bold theme-color-text">Frequently Asked Questions</h2>
                </div>
                <div class="col-lg-10 m-auto">
                    <div class="accordion custom-faq" id="glassFaqMain">
                        @foreach($faqs as $index => $faq)
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }} font-weight--bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" data-bs-parent="#glassFaqMain">
                                <div class="accordion-body text-muted">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

           @include('component.mapservice')




</div>
@endsection
