<div class="about-history-area section-space--ptb_100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="about-content-wrap wow move-up">
                    <h6 class="section-sub-title mb-20 theme-color-text">
                        {{ $about->story_subtitle ?? 'Our Story, Our Glass – Crafted to Perfection' }}
                    </h6>
                    <h2 class="font-weight--bold mb-30">
                        {!! $about->story_h2 ?? 'Welcome to The Glass People' !!}
                    </h2>
                    
                    <div class="history-text">
                        <p class="mb-20">
                            {!! $about->story_p1 !!}
                        </p>

                        <p class="mb-30">
                            {!! $about->story_p2 !!}
                        </p>

                        <div class="row mb-40">
                            <div class="col-md-6">
                                <ul class="check-list">
                                    @foreach($about->left_items as $item)
                                        <li>
                                            <i class="{{ $about->checklist_left_icon ?? 'fas fa-check-circle' }}" 
                                               style="color: {{ $about->checklist_left_color ?? '#2F437E' }};"></i> 
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="check-list">
                                    @foreach($about->right_items as $item)
                                        <li>
                                            <i class="{{ $about->checklist_right_icon ?? 'fas fa-star' }}" 
                                               style="color: {{ $about->checklist_right_color ?? '#ffc107' }};"></i> 
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    @if($about->service_locations)
                    <div class="service-locations mb-40 p-3 rounded" style="background: #f8f9fa; border-left: 4px solid #2F437E;">
                        <span class="font-weight--bold theme-color-text d-block mb-1">Serving Your Community:</span>
                        <p class="small mb-0">
                            {{-- Accessor use kiya hai pipe (|) se split karne ke liye --}}
                            {{ implode(' | ', $about->locations_list) }}
                        </p>
                    </div>
                    @endif

                    <div class="hero-button-group">
                        <a href="{{ $about->cta_link ?? url('/contact-us') }}" 
                           class="ht-btn ht-btn-md text-uppercase" 
                           style="background-color: {{ $about->cta_bg_color ?? '#2F437E' }}; border-color: {{ $about->cta_bg_color ?? '#2F437E' }};">
                            {{ $about->cta_text ?? 'Schedule Your Free Consultation' }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 mt-40 mt-lg-0">
                <div class="about-image-side wow move-up">
                    <div class="image-box position-relative">
                        <img src="{{ $about->story_img ? asset($about->story_img) : asset('assets/images/gallery/about-1.png') }}" 
                             class="img-fluid rounded shadow-lg" 
                             alt="{{ $about->story_h2 }}">
                        
                        @if($about->stats_count)
                        <div class="floating-badge bg-white p-3 shadow rounded text-center" style="position: absolute; bottom: -20px; right: 20px; border-left: 5px solid #2F437E;">
                            <h3 class="font-weight--bold mb-0 theme-color-text">{{ $about->stats_count }}</h3>
                            <p class="small text-muted mb-0">{{ $about->stats_label ?? 'Successful Projects' }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>