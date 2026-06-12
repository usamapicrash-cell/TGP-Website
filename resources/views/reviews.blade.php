@extends('layouts.app')

@section('title', $reviewSetting->title ?? 'Customer Reviews | Trusted Glass Repair Services Portland')
@section('meta_description', $reviewSetting->meta_description ?? 'Read what our clients say about our services.')
@section('meta_keywords', $reviewSetting->meta_keywords ?? 'glass repair reviews, portland glass')

@section('content')

<div class="site-wrapper-reveal">

 <!--============ Resolutions Hero Start (No Swiper) ============-->
 @if($reviewSetting->hero_status)
    <div class="hero-wrapper resolutions-hero-spaceall resolutions-hero-bg position-relative">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text mobile-fix">
                                <h1 class="font-weight--bold text-white mb-20 responsive-h1">
                                    {!! $reviewSetting->hero_heading ?? "Portland's Premier Glass Experts" !!}
                                </h1>
                                
                                <h4 class="text-white mb-30 responsive-h4">
                                    {!! $reviewSetting->hero_subheading ?? 'Woman-Owned | 20+ Years' !!}
                                </h4>

                                <div class="text text-white section-space--mt_20 mb-40 hero-description">
                                    {!! $reviewSetting->hero_description ?? 'From foggy window repairs to stunning custom shower enclosures...' !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 d-none d-md-block">
                        <div class="hero-image-side">
                            <img src="{{ $reviewSetting->hero_image ? asset($reviewSetting->hero_image) : asset('assets/images/gallery/about-1.png') }}" alt="Glass Craftsmanship" class="img-fluid">
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
                    <h2 class="breadcrumb-title mb-10" style="font-weight: 700; color: #333;">Our Reviews</h2>
                    <ul class="breadcrumb-list" style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 10px; font-size: 15px;">
                        <li><a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">Home</a></li>
                        <li style="color: #888;">></li>
                        <li style="color: #888;">Our Reviews</li>
                    </ul>
                </div>
            </div>
        </div>
@endif

            
            <!--============ Resolutions Hero End ============-->
            
             
           @include('component.reviews')
       
          
    @if($reviewSetting->breadform_status)
        @include('component.breadform')
    @endif



</div>
@endsection
