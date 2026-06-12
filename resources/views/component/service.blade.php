<div class="feature-large-images-wrapper section-space--ptb_100">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-space--mb_30">
                    <h2 class="font-weight--bold mb-10">{!! $Psetting->service_heading ?? "Glass Solutions for Every Space, Every Need" !!}</h2>
                    <p class="text-muted">{!! $Psetting->service_text ?? "Whether you're a homeowner looking to repair a broken window or a business owner needing a new storefront, The Glass People has you covered across the Portland metro area." !!}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach($Pservices as $service)
                    <div class="col-lg-3 col-md-6 mt-30">
                        <a href="{{ url('services/#' . $service->label) }}" class="box-large-image__wrap wow move-up animated">
                            <div class="box-large-image__box">
                                <div class="box-large-image__midea">
                                    <div class="images-midea">
                                        <img src="{{ asset($service->image) }}" 
                                             width="300" height="300" 
                                             alt="{{ $service->label }}">
                                        
                                        <div class="heading-wrap">
                                            <h5 class="heading">{{ $service->label }}</h5>
                                            
                                            <div class="text text-white section-space--mt_10">
                                                {{ $service->short_desc }}
                                            </div>
                                        </div>

                                        <div class="button-wrapper">
                                            <div class="btn tm-button">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

               <div class="row gx-0 section-space--mt_60">
                    <div class="col-12">
                        <div class="cta-content border-top pt-4 text-center">
                            <p class="mb-3 text-dark">
                                <strong>"{{ $Psetting->service_cta_text ?? 'Ready to Transform Your Space with Expert Glass Solutions?' }}"</strong>
                            </p>
                            
                            <a href="{{ $Psetting->service_cta_btn_link ?? url('/contact-us') }}" class="ht-btn ht-btn-md text-uppercase">
                                {{ $Psetting->service_cta_btn_text ?? 'Get Your Free Estimate Today' }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>