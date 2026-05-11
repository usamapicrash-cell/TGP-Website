<div class="flexible-image-slider-wrapper section-space--ptb_100 bg-gray d-none d-md-block">
    <div class="container-fluid gx-0">
        <div class="row gx-0">
            <div class="col-lg-12">
                <div class="section-title-wrap text-center section-space--mb_60">
                    <h2 class="font-weight--bold mb-20">
                        {{ $Psetting->project_heading ?? 'See the Glass People Difference' }}
                    </h2>
                    <p class="text-muted container" style="max-width: 800px; margin: 0 auto;">
                        {{ $Psetting->project_text ?? 'From stunning residential transformations to sleek commercial installations...' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="row gx-0">
            <div class="col-lg-12">
                <div class="flexible-image-slider-wrap">
                    <div class="swiper-container desktop-swiper auto--center-flexible__container">
                        <div class="swiper-wrapper center-plexible-row">
                            
                            @foreach ($gallery as $item)
                                <div class="swiper-slide">
                                    <a href="{{ url('gallery/#' . Str::slug($item->subCategory->name)) }}">
                                    <div class="single-flexible-slider position-relative">
                                        <img class="img-fluid" 
                                             src="{{ asset($item->image) }}" 
                                             alt="{{ $item->title }}">

                                        <div class="gallery-badge">
                                            {{ $item->subCategory->name }}
                                        </div>
                                        
                                        <div class="project-overlay">
                                            <div class="overlay-content">
                                                <h5 class="text-white">{{ $item->title }}</h5>
                                                <p class="text-white-50 small">{{ $item->location ?? 'Professional Installation' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-auto section-space--mt_30"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-project-slider-wrapper section-space--ptb_60 bg-gray d-block d-md-none">
    <div class="container">
        <div class="row gx-0">
            <div class="col-lg-12">
                <div class="section-title-wrap text-center section-space--mb_60">
                    <h2 class="font-weight--bold mb-20">
                        {{ $Psetting->project_heading ?? 'See the Glass People Difference' }}
                    </h2>
                    <p class="text-muted container" style="max-width: 800px; margin: 0 auto;">
                        {{ $Psetting->project_text ?? 'From stunning residential transformations to sleek commercial installations...' }}
                    </p>
                </div>
            </div>
        </div>

        
        <div class="swiper-container mobile-swiper">
            <div class="swiper-wrapper">
                @foreach ($gallery as $item)
                    <div class="swiper-slide">
                        <a href="{{ url('gallery/#' . Str::slug($item->subCategory->name)) }}">
                        <div class="mobile-card bg-white shadow-sm">
                            <img class="img-fluid" src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                            <div class="gallery-badge">
                                {{ $item->subCategory->name }}
                            </div>
                            <div class="p-3 text-center">
                                <h6 class="font-weight--bold mb-1">{{ $item->title }}</h6>
                                <p class="text-muted small mb-0">{{ $item->location }}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination mobile-pagination mt-4"></div>
        </div>
    </div>
</div>
<style>
     /* DESKTOP STYLES */
    .desktop-swiper .swiper-slide img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }
    /* Styling for a cleaner look */
    .project-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
        padding: 40px 20px 20px;
        opacity: 0;
        transition: all 0.3s ease-in-out;
    }
    .single-flexible-slider:hover .project-overlay {
        opacity: 1;
    }
    /* MOBILE STYLES */
    .mobile-card {
        border-radius: 12px;
        overflow: hidden;
        margin: 10px 5px;
    }
    .mobile-card img {
        height: 250px;
        width: 100%;
        object-fit: cover;
    }
    .bg-gray {
        background-color: #f8f9fa;
    }
    /* Swiper images uniform size (Optional but recommended) */
    .single-flexible-slider img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }
</style>