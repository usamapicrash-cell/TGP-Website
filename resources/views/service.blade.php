@extends('layouts.app')

@section('title', $serviceSetting->meta_title ?? 'Custom Shower Doors, Storefronts & Mirror Installation')
@section('meta_description', $serviceSetting->meta_desc ?? 'Complete glass solutions in Portland.')
@section('meta_keywords', $serviceSetting->meta_keywords ?? 'glass repair, shower doors')
@section('content')
<style>
    html {
      scroll-behavior: smooth;
    }
</style>

<div class="site-wrapper-reveal">

 <!--============ Resolutions Hero Start (No Swiper) ============-->
           @if($serviceSetting->hero_status)
    <div class="hero-wrapper resolutions-hero-spaceall resolutions-hero-bg position-relative">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text mobile-fix">
                                <h1 class="font-weight--bold text-white mb-20 responsive-h1">
                                    {!! $serviceSetting->hero_h1 ?? "Portland's Premier Glass Experts" !!}
                                </h1>
                                
                                <h4 class="text-white mb-30 responsive-h4">
                                    {!! $serviceSetting->hero_h4 ?? 'Woman-Owned | 20+ Years' !!}
                                </h4>

                                <div class="text text-white section-space--mt_20 mb-40 hero-description">
                                    {!! $serviceSetting->hero_desc ?? 'From foggy window repairs to stunning custom shower enclosures...' !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 d-none d-md-block">
                        <div class="hero-image-side">
                            <img src="{{ $serviceSetting->hero_img ? asset($serviceSetting->hero_img) : asset('assets/images/gallery/about-1.png') }}" alt="Glass Craftsmanship" class="img-fluid">
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
                    <h2 class="breadcrumb-title mb-10" style="font-weight: 700; color: #333;">Services</h2>
                    <ul class="breadcrumb-list" style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 10px; font-size: 15px;">
                        <li><a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">Home</a></li>
                        <li style="color: #888;">></li>
                        <li style="color: #888;">Services</li>
                    </ul>
                </div>
            </div>
        </div>
@endif
            <!--============ Resolutions Hero End ============-->

            <div class="feature-icon-wrapper section-space--ptb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-wrap text-center section-space--mb_60">
                        <h6 class="section-sub-title mb-20 theme-color-text">{{ $serviceSetting->intro_subtitle }}</h6>
                        <h1 class="font-weight--bold">{{ $serviceSetting->intro_heading }}</h1>
                        <p class="text-muted mt-20 mx-auto" style="max-width: 800px;">
                            {{ $serviceSetting->intro_main_desc }}
                        </p>
                    </div>
                </div>
            </div>

            @foreach($services as $index => $service)
            <div id="{{ $service->label }}" class="row mb-5 align-items-center">
                <div class="col-lg-6 wow move-up {{ $index % 2 != 0 ? 'order-lg-2' : '' }}">
                    <div class="services-image shadow-lg rounded overflow-hidden">
                        <img class="img-fluid" src="{{ asset($service->image) }}" alt="{{ $service->label }}">
                    </div>
                </div>

                <div class="col-lg-6 mt-30 mt-lg-0 {{ $index % 2 != 0 ? 'order-lg-1 text-lg-right' : '' }}">
                    <div class="section-title position-relative wow move-up">
                        <div class="gradation-sub-heading">
                            <h3 class="heading">
                                <mark class="bg-theme text-white">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</mark> 
                                {{ strtoupper($service->label) }}
                            </h3>
                        </div>
                        <h2 class="font-weight--bold mt-10 theme-color-text">{{ $service->heading }}</h2>
                        <p class="text-muted mt-20">{{ $service->short_desc }}</p>
                        
                        <div class="row mt-30 {{ $index % 2 != 0 ? 'text-left justify-content-lg-end' : '' }}">
                            <div class="col-md-6 {{ $index % 2 != 0 ? 'text-lg-right' : '' }}">
                                <h5 class="h6 font-weight--bold mb-2">{{ $service->left_heading }}</h5>
                                <ul class="service-list-bullets small text-muted {{ $index % 2 != 0 ? 'd-inline-block text-left' : '' }}">
                                    @foreach(explode(',', $service->items_left) as $item)
                                        <li>{{ trim($item) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6 {{ $index % 2 != 0 ? 'text-lg-right' : '' }}">
                                <h5 class="h6 font-weight--bold mb-2">{{ $service->right_heading }}</h5>
                                <ul class="service-list-bullets small text-muted {{ $index % 2 != 0 ? 'd-inline-block text-left' : '' }}">
                                    @foreach(explode(',', $service->items_right) as $item)
                                        <li>{{ trim($item) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!$loop->last)
                <hr class="section-space--mb_60">
            @endif
            @endforeach

            <div class="row d-none">
                <div class="col-lg-12 text-center section-space--mt_60">
                    <div class="cta-content wow move-up">
                        <p class="mb-3 text-dark"><strong>"Ready to Transform Your Space with Expert Glass Solutions?"</strong></p>
                        <a href="{{ url('/contact-us') }}" class="ht-btn ht-btn-md" style="background-color: #2F437E; border-color: #2F437E;">Get Your Free Estimate Today</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@if($serviceSetting->breadform_status)
        @include('component.breadform')
@endif



</div>
@push('scripts')
<script>
    $(document).ready(function () {
        if (window.location.hash) {
            var hash = window.location.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800);
        }
    });
</script>
@endpush
@endsection
