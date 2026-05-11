@extends('layouts.app')

@section('title', $gallerySetting->title ?? 'Project Gallery | Glass Installation')
@section('meta_description', $gallerySetting->meta_description)
@section('meta_keywords', $gallerySetting->meta_keywords)

@section('content')
<style>
    .gallery-card img { width: 100%; height: 250px; object-fit: cover; border-radius: 6px; }
    .messonry-button button.is-checked, .sub-group button.is-checked { background: #2f437e; color: white; border-color: #2f437e; }
    .messonry-button button, .sub-group button { margin: 5px; padding: 8px 20px; border: 1px solid #ddd; background: #fff; transition: 0.3s; }
</style>
<div class="site-wrapper-reveal">

 <!--============ Resolutions Hero Start (No Swiper) ============-->
             @if($gallerySetting->hero_status)
    <div class="hero-wrapper resolutions-hero-spaceall resolutions-hero-bg position-relative">
        <div class="resolutions-hero-area-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text mobile-fix">
                                <h1 class="font-weight--bold text-white mb-20 responsive-h1">
                                    {!! $gallerySetting->hero_heading ?? "Portland's Premier Glass Experts" !!}
                                </h1>
                                
                                <h4 class="text-white mb-30 responsive-h4">
                                    {!! $gallerySetting->hero_subheading ?? 'Woman-Owned | 20+ Years' !!}
                                </h4>

                                <div class="text text-white section-space--mt_20 mb-40 hero-description">
                                    {!! $gallerySetting->hero_description ?? 'From foggy window repairs to stunning custom shower enclosures...' !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 d-none d-md-block">
                        <div class="hero-image-side">
                            <img src="{{ $gallerySetting->hero_image ? asset($gallerySetting->hero_image) : asset('assets/images/gallery/about-1.png') }}" alt="Glass Craftsmanship" class="img-fluid">
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
                    <h2 class="breadcrumb-title mb-10" style="font-weight: 700; color: #333;">Gallery</h2>
                    <ul class="breadcrumb-list" style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 10px; font-size: 15px;">
                        <li><a href="{{ url('/') }}" style="color: #007bff; text-decoration: none;">Home</a></li>
                        <li style="color: #888;">></li>
                        <li style="color: #888;">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
@endif

    @if($gallerySetting->breadform_status)
        @include('component.breadform')
    @endif

            <!--============ Resolutions Hero End ============-->
            
            <div class="feature-icon-wrapper section-space--ptb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center section-space--mb_60">
                    <h6 class="section-sub-title mb-20 theme-color-text">{{ $gallerySetting->portfolio_subtitle ?? 'Portfolio' }}</h6>
                    <h1 class="font-weight--bold">{{ $gallerySetting->portfolio_heading ?? 'Our Work Speaks for Itself' }}</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <div class="messonry-button">
                        <button class="is-checked" data-filter="*">All Work</button>
                        @foreach($categories as $cat)
                            <button data-filter=".{{ $cat->slug }}" data-target="{{ $cat->slug }}-subs">{{ $cat->name }}</button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 text-center section-space--mb_40">
                    <div class="sub-category-wrapper">
                        @foreach($categories as $cat)
                        <div id="{{ $cat->slug }}-subs" class="sub-group" style="display:none;">
                            @foreach($cat->subCategories as $sub)
                                <button data-filter=".{{ $sub->slug }}">{{ $sub->name }}</button>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mesonry-list">
                @foreach($categories as $cat)
                    @foreach($cat->subCategories as $sub)
                        @foreach($sub->items as $item)
                        <div class="col-lg-4 col-md-6 mb-30 res-grid-item {{ $cat->slug }} {{ $sub->slug }}">
                            <div class="gallery-card shadow-sm h-100 bg-white">
                                <div class="gallery-image position-relative">
                                    <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->title }}">
                                    <div class="gallery-badge">
                                        {{ $sub->name }}
                                    </div>
                                </div>
                                <div class="gallery-content p-3">
                                    <h5 class="mb-1">{{ $item->title }}</h5>
                                    <p class="small text-muted mb-0"><i class="fas fa-map-marker-alt mr-1"></i> {{ $item->location }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
            @include('component.talk')

            @include('component.quote')

</div>

{{-- Scripts --}}
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elem = document.querySelector('.mesonry-list');
    var iso = new Isotope(elem, {
        itemSelector: '.res-grid-item',
        layoutMode: 'fitRows'
    });

    // Main Filters
    document.querySelector('.messonry-button').addEventListener('click', function(e) {
        if (!e.target.matches('button')) return;
        
        let filterValue = e.target.getAttribute('data-filter');
        let targetId = e.target.getAttribute('data-target');

        // Update Active UI
        this.querySelectorAll('button').forEach(b => b.classList.remove('is-checked'));
        e.target.classList.add('is-checked');

        // Toggle Sub Groups
        document.querySelectorAll('.sub-group').forEach(g => g.style.display = 'none');
        if(targetId) {
            let group = document.getElementById(targetId);
            if(group) group.style.display = 'block';
        }

        iso.arrange({ filter: filterValue });
    });

    // Sub Filters
    document.querySelectorAll('.sub-group').forEach(group => {
        group.addEventListener('click', function(e) {
            if (!e.target.matches('button')) return;
            this.querySelectorAll('button').forEach(b => b.classList.remove('is-checked'));
            e.target.classList.add('is-checked');
            iso.arrange({ filter: e.target.getAttribute('data-filter') });
        });
    });

    imagesLoaded(elem, () => iso.layout());
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    let hash = window.location.hash.replace('#', '');

    if(hash){

        // Scroll to gallery
        let section = document.querySelector('.feature-icon-wrapper');
        if(section){
            window.scrollTo({
                top: section.offsetTop - 100,
                behavior: 'smooth'
            });
        }

        // STEP 1: Sub-category button find karo
        let subBtn = document.querySelector(`.sub-group button[data-filter=".${hash}"]`);

        if(subBtn){

            // STEP 2: uska parent group (div) lo
            let subGroup = subBtn.closest('.sub-group');

            if(subGroup){

                // STEP 3: parent category ka slug nikalo
                let parentSlug = subGroup.id.replace('-subs','');

                // STEP 4: parent button activate karo
                let parentBtn = document.querySelector(`.messonry-button button[data-filter=".${parentSlug}"]`);

                if(parentBtn){
                    parentBtn.click(); // parent active
                }

                // STEP 5: correct sub group show karo
                document.querySelectorAll('.sub-group').forEach(g => g.style.display = 'none');
                subGroup.style.display = 'block';

                // STEP 6: sub button active karo
                subGroup.querySelectorAll('button').forEach(b => b.classList.remove('is-checked'));
                subBtn.classList.add('is-checked');

                // STEP 7: isotope filter apply
                if(typeof iso !== 'undefined'){
                    iso.arrange({ filter: '.' + hash });
                }
            }
        }
    }

});
</script>
@endsection