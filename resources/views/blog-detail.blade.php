@extends('layouts.app')

{{-- SEO Meta Tags Dynamic --}}
@section('title', $post->title . ' | The Glass People Blog')
@section('meta_description', $post->excerpt)
@section('meta_keywords', 'glass repair, ' . ($post->category->name ?? 'blog') . ', portland glass')

@section('content')
<style>
    .single-image-top {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }
    .blog-content-area {
        line-height: 1.8;
        font-size: 17px;
        color: #333;
    }
    .blog-content-area h1, .blog-content-area h2, .blog-content-area h3 {
        margin-top: 5px;
        margin-bottom: 5px;
        font-weight: bold;
        color: #2f437e;
        font-size: 15px;
    }
</style>

<div class="site-wrapper-reveal">

    <div class="hero-wrapper resolutions-hero-spaceall resolutions-hero-bg position-relative" style="background: #2f437e;">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 m-auto">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text">
                                <h1 class="font-weight--reguler text-white mb-10 d-block">{{ $post->title }}</h1>
                                <p class="text-white-50">
                                    <i class="far fa-folder-open"></i> {{ $post->category->name ?? 'General' }} | 
                                    <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($post->date)->format('M d, Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <div class="feature-icon-wrapper section-space--ptb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="section-title-wrap text-center section-space--mb_40">
                        {{-- Featured Image --}}
                        <img src="{{ asset($post->image ?? 'default-blog.png') }}" 
                             class="img-fluid mb-4 rounded shadow single-image-top" 
                             alt="{{ $post->title }}">
                    </div>

                    {{-- Main Content from Database --}}
                    <div class="blog-content-area">
                        {!! $post->content !!}
                    </div>
                    
                    {{-- Share or Back Button --}}
                    <div class="row mt-5 border-top pt-4">
                        <div class="col-12">
                            <a href="{{ route('blogs') }}" class="ht-btn ht-btn-sm text-white" style="background: #2f437e;">
                                <i class="fas fa-chevron-left mr-2"></i> Back to Blogs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection