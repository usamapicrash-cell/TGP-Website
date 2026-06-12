<section class="tgp-quote-section d-none d-md-block">
    <div class="container-lg">
        <div class="quote-form-card" style="padding: 25px; border-radius: 10px; background: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <h3 class="form-title mb-3" style="font-size: 20px;">Let Us Call You</h3>
            
            <form action="{{ route('contact.send') }}" method="POST" class="tgp-main-form" id="main-contact-form">
                @csrf
                
                <div class="form-group-radio mb-3">
                    <label class="label-main" style="font-size: 13px; margin-bottom: 8px;">Service Type*</label>
                    <div class="radio-flex d-flex gap-3">
                        @forelse($Pservices as $key => $service)
                            <label class="radio-item mb-0" style="font-size: 14px;">
                                <input type="radio" name="service_type" value="{{ $service->label }}" {{ $key == 0 ? 'checked' : '' }}> 
                                <span>{{ $service->label }}</span>
                            </label>
                        @empty
                            <label class="radio-item mb-0">
                                <input type="radio" name="service_type" value="General Inquiry" checked> <span>General Inquiry</span>
                            </label>
                        @endforelse
                    </div>
                </div>

                <div class="form-input-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
                    <div class="input-wrap">
                        <label style="font-size: 12px;">First Name*</label>
                        <input type="text" name="first_name" placeholder="John" required style="padding: 10px;">
                    </div>
                    <div class="input-wrap">
                        <label style="font-size: 12px;">Last Name*</label>
                        <input type="text" name="last_name" placeholder="Smith" required style="padding: 10px;">
                    </div>
                    <div class="input-wrap">
                        <label style="font-size: 12px;">Email*</label>
                        <input type="email" name="email" placeholder="email@example.com" required style="padding: 10px;">
                    </div>
                    <div class="input-wrap">
                        <label style="font-size: 12px;">Phone Number*</label>
                        <input type="tel" name="phone" placeholder="(555) 555-5555" required style="padding: 10px;">
                    </div>
                    <div class="input-wrap">
                        <label style="font-size: 12px;">ZIP Code*</label>
                        <input type="text" name="zip_code" placeholder="03801" required style="padding: 10px;">
                    </div>
                </div>

                <div class="row mt-3 align-items-end">
                    <div class="col-md-10">
                        <div class="input-wrap mb-0">
                            <textarea name="message" rows="1" placeholder="Brief details..." required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ddd; resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="submit" class="tgp-submit-btn" style="width: auto; margin: 5px 0px; font-size: 14px; border-radius: 6px; min-width: 160px;">
                            Get Quote <i class="fa fa-paper-plane ms-1"></i>
                        </button>
                    </div>
                </div>

                <div class="form-consent mt-3">
                    <small class="text-muted" style="font-size: 12px; line-height: 1.5;">
                        By submitting this form, you agree to our 
                        <a href="{{ url('/privacy-policy') }}" class="text-primary fw-semibold text-decoration-underline">
                            Privacy Policy
                        </a> 
                        and 
                        <a href="{{ url('/terms-conditions') }}" class="text-primary fw-semibold text-decoration-underline">
                            Terms & Conditions
                        </a>.
                    </small>
                </div>
                <div id="form-response-msg"></div>
            </form>
        </div>
    </div>
</section>