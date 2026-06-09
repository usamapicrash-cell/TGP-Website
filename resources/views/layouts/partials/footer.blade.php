<!--====================  footer area ====================-->
       <div class="footer-area-wrapper reveal-footer bg-blue">
    <div class="footer-area section-space--ptb_80">
        <div class="container">
            <div class="row footer-widget-wrapper">
                <div class="col-lg-4 col-md-6 col-sm-6 footer-widget">
                    <div class="footer-widget__logo mb-30">
                        <img src="{{ url('assets/images/logo/logo.png') }}" width="160" height="48" class="img-fluid" alt="The Glass People">
                    </div>
                    <div class="text section-space--mt_10 text-white-50">
                        {{ $Pcontact->footer_short_desc ?? 'The Glass People specialize in premium residential and commercial glass solutions. From custom mirrors to emergency glass repairs, we deliver excellence in every pane.' }}
                    </div>
                </div>
                    @if(isset($footers[1]))
                    <div class="col-lg-2 col-md-4 col-sm-6 footer-widget footer-widget-mobile">
                        <h6 class="footer-widget__title mb-20 text-white text-uppercase">Navigation</h6>
                        <ul class="footer-widget__list">
                            @foreach($footers[1] as $link)
                                @if(!empty($link->title))
                                    <li><a href="{{ url($link->url ?? '#') }}" class="hover-style-link text-white-50">{{ $link->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(isset($footers[2]))
                    <div class="col-lg-2 col-md-4 col-sm-6 footer-widget footer-widget-mobile">
                        <h6 class="footer-widget__title mb-20 text-white text-uppercase">Support</h6>
                        <ul class="footer-widget__list">
                            @foreach($footers[2] as $link)
                                @if(!empty($link->title))
                                    <li><a href="{{ url($link->url ?? '#') }}" class="hover-style-link text-white-50">{{ $link->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(isset($footers[3]))
                    <div class="col-lg-2 col-md-4 col-sm-6 footer-widget footer-widget-mobile">
                        <h6 class="footer-widget__title mb-20 text-white text-uppercase">Services</h6>
                        <ul class="footer-widget__list">
                            @foreach($footers[3] as $link)
                                @if(!empty($link->title))
                                    <li><a href="{{ url($link->url ?? '#') }}" class="hover-style-link text-white-50">{{ $link->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

                <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                    <h6 class="footer-widget__title mb-20 text-white text-uppercase">Connect With Us</h6>
                    <p class="text-white-50 mb-20">{{ $Pcontact->social_follow_text ?? 'Follow us for our latest glass projects and updates.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright-area section-space--pb_30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="copyright-text text-white-50">
                        &copy; 2026 <strong>The Glass People</strong>. All Rights Reserved.
                    </p>
                </div>

                <div class="col-md-6 text-center text-md-end">
                            <ul class="list ht-social-networks solid-rounded-icon">
                                @if($Pcontact->facebook)
                                <li class="item">
                                    <a href="{{ $Pcontact->facebook }}" target="_blank" aria-label="Facebook" class="social-link">
                                        <i class="fab fa-facebook-f link-icon text-white"></i>
                                    </a>
                                </li>
                                @endif
                                @if($Pcontact->instagram)
                                <li class="item">
                                    <a href="{{ $Pcontact->instagram }}" target="_blank" aria-label="Instagram" class="social-link">
                                        <i class="fab fa-instagram link-icon text-white"></i>
                                    </a>
                                </li>
                                @endif
                                @if($Pcontact->whatsapp)
                                <li class="item">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $Pcontact->whatsapp) }}" target="_blank" aria-label="WhatsApp" class="social-link">
                                        <i class="fab fa-whatsapp link-icon text-white"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
            </div>
        </div>
    </div>
</div>
        <!--====================  End of footer area  ====================-->

    </div>

    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top fas fa-chevron-up"></i>
        <i class="arrow-bottom fas fa-chevron-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->
    <!-- Start Toolbar -->
    <div class="demo-option-container d-none">
        <!-- Start Toolbar -->
        <div class="aeroland__toolbar">
            <div class="inner">
                <a class="quick-option hint--bounce hint--left hint--black primary-color-hover-important" href="#" aria-label="Location">
                    <i class="fas fa-map-marker"></i>
                </a>
                <a class="hint--bounce hint--left hint--black primary-color-hover-important" target="_blank" href="https://hasthemes.com/contact-us/" aria-label="Phone">
                    <i class="fas fa-phone"></i>
                </a>
                <a class="hint--bounce hint--left hint--black primary-color-hover-important" target="_blank" href="https://1.envato.market/c/417168/275988/4415?subId1=hastheme&amp;subId2=mitech-preview&amp;subId3=https%3A%2F%2Fthemeforest.net%2Fcart%2Fconfigure_before_adding%2F24906742%3Flicense%3Dregular%26size%3Dsource&amp;u=https%3A%2F%2Fthemeforest.net%2Fcart%2Fconfigure_before_adding%2F24906742%3Flicense%3Dregular%26size%3Dsource" aria-label="Email">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
        <!-- End Toolbar -->
    </div>
    <!-- End Toolbar -->

    <div class="glass-social-sidebar active">
    <div class="inner">
        <a class="social-item toggle-btn" href="javascript:void(0)"><i class="fas fa-arrow-left"></i></a>
        
        @if($Pcontact->whatsapp)
        <a class="social-item whatsapp" target="_blank" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $Pcontact->whatsapp) }}">
            <span class="label">WhatsApp</span><i class="fab fa-whatsapp"></i>
        </a>
        @endif
        
        @if($Pcontact->instagram)
        <a class="social-item instagram" target="_blank" href="{{ $Pcontact->instagram }}">
            <span class="label">Instagram</span><i class="fab fa-instagram"></i>
        </a>
        @endif
        
        @if($Pcontact->facebook)
        <a class="social-item facebook" target="_blank" href="{{ $Pcontact->facebook }}">
            <span class="label">Facebook</span><i class="fab fa-facebook-f"></i>
        </a>
        @endif

        @if($Pcontact->phone)
        <a class="social-item phone" target="_blank" href="tel:{{ preg_replace('/[^0-9]/', '', $Pcontact->phone) }}">
            <span class="label">Call Us</span><i class="fa fa-phone"></i>
        </a>
        @endif
    </div>
</div>

    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8">
                            <!-- logo -->
                            <div class="logo">
                                <a href="index.html">
                                    <img src="assets/images/logo/logo.png" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-end">
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                    <ul>
                        @foreach($menuTree as $item)
                            @php
                                $hasChildren = isset($item->children) && count($item->children) > 0;
                            @endphp

                            <li class="{{ $hasChildren ? 'has-children' : '' }}">
                                @if($hasChildren)
                                    <span class="menu-expand"><i></i></span>
                                @endif
                                
                                <a href="{{ url($item->url) }}"><span>{{ $item->title }}</span></a>

                                @if($hasChildren)
                                    <ul class="sub-menu">
                                        @foreach($item->children as $child)
                                            @php 
                                                $hasGrandChildren = isset($child->children) && count($child->children) > 0; 
                                            @endphp
                                            
                                            <li class="{{ $hasGrandChildren ? 'has-children' : '' }}">
                                                @if($hasGrandChildren)
                                                    <span class="menu-expand"><i></i></span>
                                                @endif
                                                
                                                <a href="{{ url($child->url) }}"><span>{{ $child->title }}</span></a>
                                                
                                                @if($hasGrandChildren)
                                                    <ul class="sub-menu">
                                                        @foreach($child->children as $grandChild)
                                                            <li>
                                                                <a href="{{ url($grandChild->url) }}"><span>{{ $grandChild->title }}</span></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->