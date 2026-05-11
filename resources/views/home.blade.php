@extends('layouts.app')

@section('title', $setting->seo_title ?? 'Glass Repair Portland')
@section('meta_description', $setting->seo_meta_description ?? '')
@section('meta_keywords', $setting->seo_meta_keywords ?? '')
@section('content')

<div class="site-wrapper-reveal">






          <div class="resolutions-hero-slider position-relative">
    <div class="hero-wrapper resolutions-hero-space resolutions-hero-bg" 
             style="background-image: url('{{ asset($setting->hero_image ?? 'assets/images/banners/glassweb.png') }}');">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text mobile-fix">
                                <h1 class="font-weight--bold text-white mb-20 responsive-h1">
                                        {!! $setting->hero_heading ?? "Portland's Premier Glass Experts" !!}
                                    </h1>
                                    
                                    <h4 class="text-white mb-30 responsive-h4">
                                        {!! $setting->hero_subheading ?? 'Woman-Owned | 20+ Years Excellence' !!}
                                    </h4>

                                <div class="text text-white section-space--mt_20 mb-40 hero-description">
                                        {!! $setting->hero_description ?? '' !!}
                                </div>

                                <div class="hero-button-group mb-40">
                                        <a href="{{ $setting->hero_btn1_link ?? '#quote-section' }}" class="ht-btn ht-btn-md btn-primary text-uppercase mr-3 mb-3 responsive-btn">
                                            {{ $setting->hero_btn1_text ?? 'Get Your Free Quote' }}
                                        </a>
                                        <a href="{{ $setting->hero_btn2_link ?? 'tel:5036908481' }}" class="ht-btn ht-btn-md btn--lightcgreen text-uppercase mb-3 responsive-btn">
                                            <i class="fas fa-phone-alt mr-2"></i> {{ $setting->hero_btn2_text ?? 'Call Now' }}
                                        </a>
                                </div>

                                <div class="trust-badges-wrap d-flex flex-wrap responsive-badges">
                                        @if($setting->hero_star_label1) <div class="badge-item"><i class="fas fa-check-circle"></i> {{ $setting->hero_star_label1 }}</div> @endif
                                        @if($setting->hero_star_label2) <div class="badge-item"><i class="fas fa-check-circle"></i> {{ $setting->hero_star_label2 }}</div> @endif
                                        @if($setting->hero_star_label3) <div class="badge-item"><i class="fas fa-star"></i> {{ $setting->hero_star_label3 }}</div> @endif
                                        @if($setting->hero_star_label4) <div class="badge-item"><i class="fas fa-tools"></i> {{ $setting->hero_star_label4 }}</div> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-down d-none d-md-block">
            <span>SCROLL</span>
        </div>
    </div>
</div>
			
			<!--============ Resolutions Hero End ============-->


			@include('component.about')
            @include('component.service')
            @include('component.homegal')
            @include('component.misvis')
            @include('component.testimonial')

           
            @include('component.mapservice')
            @include('component.talk')
            @include('component.quote')
                  


        </div>
@endsection
