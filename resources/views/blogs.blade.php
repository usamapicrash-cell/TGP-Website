@extends('layouts.app')

@section('title', $blogSetting->title ?? 'Glass Maintenance Tips | Portland Glass Blog')
@section('meta_description', $blogSetting->meta_description ?? 'Expert advice on glass repair and maintenance.')
@section('meta_keywords', $blogSetting->meta_keywords ?? 'glass repair tips, portland blog')

@section('content')

<div class="site-wrapper-reveal">

 <!--============ Resolutions Hero Start (No Swiper) ============-->
            @if($blogSetting->hero_status)
    <div class="hero-wrapper resolutions-hero-spaceall resolutions-hero-bg position-relative">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text mobile-fix">
                                <h1 class="font-weight--bold text-white mb-20 responsive-h1">
                                    {!! $blogSetting->hero_heading ?? "Portland's Premier Glass Experts" !!}
                                </h1>
                                
                                <h4 class="text-white mb-30 responsive-h4">
                                    {!! $blogSetting->hero_subheading ?? 'Woman-Owned | 20+ Years' !!}
                                </h4>

                                <div class="text text-white section-space--mt_20 mb-40 hero-description">
                                    {!! $blogSetting->hero_description ?? 'From foggy window repairs to stunning custom shower enclosures...' !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 d-none d-md-block">
                        <div class="hero-image-side">
                            <img src="{{ $blogSetting->hero_image ? asset($blogSetting->hero_image) : asset('assets/images/gallery/about-1.png') }}" alt="Glass Craftsmanship" class="img-fluid">
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
                    <h2 class="breadcrumb-title mb-10" style="font-weight: 700; color: #333;">Blog</h2>
                    <ul class="breadcrumb-list" style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 10px; font-size: 15px;">
                        <li><a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">Home</a></li>
                        <li style="color: #888;">></li>
                        <li style="color: #888;">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
@endif

    @if($blogSetting->breadform_status)
        @include('component.breadform')
    @endif

            <!--============ Resolutions Hero End ============-->
            
            <div class="feature-icon-wrapper section-space--ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h6 class="section-sub-title mb-20 theme-color-text">
                                    {{ $blogSetting->blog_subtitle ?? 'Expert Insights & Updates' }}
                                </h6>
                                <h1 class="font-weight--bold">
                                    {{ $blogSetting->blog_heading ?? 'Latest From Our Blog' }}
                                </h1>
                                @if($blogSetting->meta_description)
                                <p class="text-muted mt-20 mx-auto" style="max-width: 700px;">
                                    {{ $blogSetting->meta_description }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @forelse($posts as $post)
                        <div class="col-md-4 mb-4">
                            {{-- Assuming you have a route named blog.detail --}}
                            <a href="{{ route('blog.detail', $post->slug) }}" class="text-decoration-none text-dark">
                                <div class="card h-100 shadow-sm border-0 blog-glass-card">
                                    <div class="blog-img-wrapper overflow-hidden position-relative">
                                        <img src="{{ asset($post->image ?? 'default-blog.png') }}" 
                                             class="card-img-top blog-zoom" 
                                             alt="{{ $post->title }}">
                                        
                                        @if($post->category)
                                        <span class="blog-category-badge">{{ $post->category->name }}</span>
                                        @endif
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title font-weight--bold theme-color-text">{{ $post->title }}</h5>
                                        <p class="card-text text-muted small">
                                            {{ $post->excerpt }}
                                        </p>
                                    </div>

                                    <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center pb-3">
                                        <span class="read-more-link small font-weight--bold">
                                            Read More <i class="fas fa-arrow-right ml-1"></i>
                                        </span>
                                        <small class="text-muted">
                                            <i class="far fa-calendar-alt mr-1"></i> 
                                            {{ \Carbon\Carbon::parse($post->date)->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No blog posts found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>


            @include('component.talk')

            @include('component.quote')

</div>
@endsection
