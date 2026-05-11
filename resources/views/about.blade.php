@extends('layouts.app')

@section('title', $about->meta_title ?? 'About Our Glass Company')
@section('meta_description', $about->meta_description ?? 'Learn why we are the top choice...')
@section('meta_keywords', $about->meta_keywords ?? 'local glass company')
@section('content')

<div class="site-wrapper-reveal">

 <!--============ Resolutions Hero Start (No Swiper) ============-->
            @if($about->hero_status)
    <div class="hero-wrapper resolutions-hero-spaceall resolutions-hero-bg position-relative">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text mobile-fix">
                                <h1 class="font-weight--bold text-white mb-20 responsive-h1">
                                    {!! $about->hero_h1 ?? "Portland's Premier Glass Experts" !!}
                                </h1>
                                
                                <h4 class="text-white mb-30 responsive-h4">
                                    {!! $about->hero_h4 ?? 'Woman-Owned | 20+ Years' !!}
                                </h4>

                                <div class="text text-white section-space--mt_20 mb-40 hero-description">
                                    {!! $about->hero_desc ?? 'From foggy window repairs to stunning custom shower enclosures...' !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 d-none d-md-block">
                        <div class="hero-image-side">
                            <img src="{{ $about->hero_img ? asset($about->hero_img) : asset('assets/images/gallery/about-1.png') }}" alt="Glass Craftsmanship" class="img-fluid">
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
                    <h2 class="breadcrumb-title mb-10" style="font-weight: 700; color: #333;">About Us</h2>
                    <ul class="breadcrumb-list" style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 10px; font-size: 15px;">
                        <li><a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">Home</a></li>
                        <li style="color: #888;">></li>
                        <li style="color: #888;">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
@endif

    @if($about->breadform_status)
        @include('component.breadform')
    @endif
            <!--============ Resolutions Hero End ============-->

            @include('component.abouthere')

            @include('component.misvis')
            @include('component.ourteam')

            @include('component.service')
            @include('component.talk')



</div>
@endsection
