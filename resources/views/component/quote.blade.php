<section id="contractor-enquiries" class="section-space--ptb_120 bg-gray-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="contractor-content-wrap">
                    <h2 class="font-weight--bold mb-10">{{ $Psetting->contractor_heading ?? "Wait, There's More! ↓" }}</h2>
                    <h4 class="text-color-primary mb-30">{{ $Psetting->contractor_subheading ?? "Beyond Standard Glass Services" }}</h4>
                    
                    <p class="mb-30 text-muted">
                        {{ $Psetting->contractor_description ?? "We also offer specialized services for contractors, construction projects, and commercial RFQs." }}
                    </p>
                    
                    <ul class="check-list mb-40">
                        @if(!empty($Psetting->contractor_bullets))
                            @foreach($Psetting->contractor_bullets as $bullet)
                                <li class="list-item">{{ $bullet }}</li>
                            @endforeach
                        @else
                            <li class="list-item"> Glass Maintenance Packages (Home & Business)</li>
                            <li class="list-item"> Contractor & Construction Project Support</li>
                            <li class="list-item"> Bulk Commercial Glass Orders</li>
                        @endif
                    </ul>

                    <div class="cta-buttons d-flex flex-wrap align-items-center">
                        <a href="{{ $Psetting->contractor_btn1_link ?? 'https://wa.me/15036908481' }}" class="ht-btn ht-btn-md btn--whatsapp me-3 mb-3">
                            <i class="fab fa-whatsapp"></i> {{ $Psetting->contractor_btn1_text ?? "WhatsApp Enquiry" }}
                        </a>
                        <a href="{{ $Psetting->contractor_btn2_link ?? 'mailto:admin@theglasspeople.com' }}" class="ht-btn ht-btn-md btn--secondary mb-3" style="background-color: #2F437E; border: none;">
                            <i class="fas fa-envelope"></i> {{ $Psetting->contractor_btn2_text ?? "Email RFQ" }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="custom-quote-box shadow-lg">
                    <div class="contact-title text-center mb-4">
                        <h2 class="h3 text-white">Contractor RFQ Form</h2>
                        <p class="text-white-50">Join 2000+ satisfied customers. Let’s get your project started.</p>
                    </div>

                    <form class="contact-form" id="contact-form-2" action="{{ route('contractor.send') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-inner mb-3">
                                    <input name="con_name" type="text" placeholder="Your Name *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-inner mb-3">
                                    <input name="con_phone" type="text" placeholder="Phone Number *" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-inner mb-3">
                                    <input name="con_email" type="email" placeholder="Email Address *" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-inner mb-3">
                                    <select name="service_type" class="custom-select-glass" required>
                                        <option value="" disabled selected>Select Service Type</option>
                                        <option value="Maintenance Package">Glass Maintenance Package</option>
                                        <option value="Contractor Support">Contractor Project Support</option>
                                        <option value="Bulk Order">Bulk Commercial Order</option>
                                        <option value="Custom Consultation">Custom Consultation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-inner mb-4">
                                    <textarea name="con_message" placeholder="Describe your project, volume requirements, or blueprint details..." required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn-quote-submit text-uppercase" type="submit">Request Detailed Quote</button>
                                <p class="form-messege-2 mt-3 text-white-50"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

