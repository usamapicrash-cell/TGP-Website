@extends('layouts.app')

@section('title', $page->meta_title ?? $page->page_name)
@section('meta_description', $page->meta_description ?? '')
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')

<div class="site-wrapper-reveal">

    @if($page->hero_status)
    <div class="hero-wrapper resolutions-hero-spaceall resolutions-hero-bg position-relative">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text mobile-fix">
                                <h1 class="font-weight--bold text-white mb-20 responsive-h1">
                                    {!! $page->hero_h1 ?? "Portland's Premier Glass Experts" !!}
                                </h1>
                                
                                <h4 class="text-white mb-30 responsive-h4">
                                    {!! $page->hero_h4 ?? 'Woman-Owned | 20+ Years' !!}
                                </h4>

                                <div class="text text-white section-space--mt_20 mb-40 hero-description">
                                    {!! $page->hero_desc ?? 'From foggy window repairs to stunning custom shower enclosures...' !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 d-none d-md-block">
                        <div class="hero-image-side">
                            <img src="{{ $page->hero_img ? asset($page->hero_img) : asset('assets/images/gallery/about-1.png') }}" alt="Glass Craftsmanship" class="img-fluid">
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
                <h2 class="breadcrumb-title mb-10" style="font-weight: 700; color: #333;">{{ $page->page_name }}</h2>
                <ul class="breadcrumb-list" style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 10px; font-size: 15px;">
                    <li><a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">Home</a></li>
                    <li style="color: #888;">></li>
                    <li style="color: #888;">{{ $page->page_name }}</li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    <div class="dynamic-content-area section-space--ptb_80">
        @if(is_array($page->content_json))
            @foreach($page->content_json as $section)
            
                <div class="container mb-5">
                    
                    {{-- Layout: Full Width Text --}}
                    @if($section['type'] == 'text_only')
                        <div class="row">
                            <div class="col-12">
                                @if(!empty($section['heading']))
                                    <h3 class="mb-4">{{ $section['heading'] }}</h3>
                                @endif
                                <div>{!! nl2br($section['text']) !!}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Layout: Image Left | Text Right --}}
                    @if($section['type'] == 'left_img_right_text')
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                @if(!empty($section['image']))
                                    <img src="{{ asset($section['image']) }}" alt="Section Image" class="img-fluid rounded shadow">
                                @endif
                            </div>
                            <div class="col-lg-6">
                                @if(!empty($section['heading']))
                                    <h3 class="mb-3">{{ $section['heading'] }}</h3>
                                @endif
                                <div>{!! nl2br($section['text']) !!}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Layout: Text Left | Image Right --}}
                    @if($section['type'] == 'right_img_left_text')
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-2 order-lg-1">
                                @if(!empty($section['heading']))
                                    <h3 class="mb-3">{{ $section['heading'] }}</h3>
                                @endif
                                <div>{!! nl2br($section['text']) !!}</div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                                @if(!empty($section['image']))
                                    <img src="{{ asset($section['image']) }}" alt="Section Image" class="img-fluid rounded shadow">
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- Layout: Google Map --}}
                    @if($section['type'] == 'google_map')
                        <div class="row">
                            <div class="col-12">
                                @if(!empty($section['map']))
                                    <div class="map-responsive">
                                        <iframe src="{{ $section['map'] }}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        @endif
    </div>

</div>
@endsection