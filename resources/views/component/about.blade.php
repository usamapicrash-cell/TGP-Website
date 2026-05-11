<div id="nextSection" class="feature-large-images-wrapper section-space--ptb_100">
    <div class="container-fluid gx-0"> 
        <div class="row gx-0 align-items-center">
            <div class="col-lg-5 position-relative">
                <img src="{{ asset($setting->about_image_1 ?? 'assets/images/gallery/about-1.png') }}" 
                     alt="The Glass People Craftsmanship" class="img-fluid w-100 homeabout-img">
                
                <div class="homeabout-img-border"></div>
                
                <img src="{{ asset($setting->about_image_2 ?? 'assets/images/gallery/about-2.png') }}" 
                     alt="Glass Excellence" class="img-fluid homeabout-img2">
            </div>

            <div class="col-lg-7">
                <div class="home-about-text">
                    <h2 class="font-weight--bold mb-30">
                        {!! $setting->about_heading ?? 'Your Story, Our Glass – <br> Crafted to Perfection' !!}
                    </h2>
                    
                    <div class="text section-space--mt_10">
                        {!! $setting->about_description ?? 'Welcome to <strong>The Glass People</strong> – Portland\'s trusted glass experts.' !!}
                    </div>

                    <div class="row gx-0 section-space--mt_40">
                        <div class="col-12">
                            <div class="cta-content border-top pt-4">
                                <p class="mb-3 text-dark">
                                    <strong>"{{ $setting->about_cta_text ?? 'From the first call to the final installation – experience the difference.' }}"</strong>
                                </p>
                                <a href="{{ $setting->about_cta_btn_link ?? url('/contact-us') }}" class="ht-btn ht-btn-md text-uppercase">
                                    {{ $setting->about_cta_btn_text ?? 'Schedule Your Free Consultation' }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .check-list-style { list-style: none; padding-left: 0; }
    .check-list-style li { position: relative; padding-left: 25px; margin-bottom: 10px; font-size: 16px; }
    .check-list-style li::before { content: "✔"; position: absolute; left: 0; color: #2F437E; font-weight: bold; }
    .service-locations { font-style: italic; color: #555; border-left: 3px solid #2F437E; padding-left: 10px; }
</style>