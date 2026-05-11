<div class="feature-icon-wrapper section-space--ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrap text-center section-space--mb_60">
                    <h2 class="font-weight--bold mb-20">
                        {{ $Psetting->why_choose_heading ?? 'The Clear Choice for Glass Excellence' }}
                    </h2>
                    <p class="text-center container" style="max-width: 850px;">
                        {{ $Psetting->why_choose_text ?? "As Portland's trusted glass professionals, we combine decades of expertise with a personal touch." }}
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="row">
                    @if(!empty($Psetting->why_choose_badges))
                        @foreach($Psetting->why_choose_badges as $badge)
                        <div class="col-md-6 mb-30">
                            <div class="custom-feature-card h-100">
                                <div class="icon-badge">
                                    <i class="{{ $badge['icon'] ?? 'fas fa-check-circle' }}"></i>
                                </div>
                                <h5>{{ $badge['title'] ?? '' }}</h5>
                                <p>{{ $badge['desc'] ?? '' }}</p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-md-6 mb-30">
                            <div class="custom-feature-card h-100">
                                <div class="icon-badge"><i class="fas fa-female"></i></div>
                                <h5>Woman-Owned & Local</h5>
                                <p>Supporting local means supporting your community. We bring a family touch.</p>
                            </div>
                        </div>
                        @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="feature-main-image text-center">
                    <img src="{{ asset($Psetting->why_choose_side_image ?? 'assets/images/gallery/galslider-3.png') }}" 
                         class="img-fluid rounded-20 shadow-lg" 
                         alt="Glass Excellence">
                    
                    <div class="mt-4 p-3 border rounded bg-white shadow-sm">
                        <p class="small text-dark mb-0">
                            <strong>Serving:</strong> 
                            @if($PserviceArea->isNotEmpty())
                                {{ $PserviceArea->pluck('city_name')->implode(' | ') }}
                            @else
                                Portland, Hillsboro, Beaverton, Lake Oswego, Tigard, Tualatin, Salem, & Gresham.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row section-space--mt_60">
            <div class="col-12 text-center">
                <div class="cta-content border-top pt-4">
                    <h4 class="mb-3 text-dark">
                        {{ $Psetting->why_choose_cta_text ?? 'Join 2000+ Satisfied Customers – Experience the Glass People Difference Today' }}
                    </h4>
                    <a href="{{ $Psetting->why_choose_cta_btn_link ?? url('/contact-us') }}" class="ht-btn ht-btn-md text-uppercase">
                        {{ $Psetting->why_choose_cta_btn_text ?? 'Request Your Free Quote' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-feature-card {
        padding: 30px;
        border: 1px solid #eee;
        border-radius: 15px;
        transition: 0.3s;
        background: #fff;
    }
    .custom-feature-card:hover {
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transform: translateY(-5px);
    }
    .icon-badge {
        font-size: 24px;
        color: #2f437e;
        margin-bottom: 15px;
    }
    .rounded-20 { border-radius: 20px; }
</style>