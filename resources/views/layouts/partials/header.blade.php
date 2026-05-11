<div class="header-area header-area--absolute">
    <div class="header-top-bar-info border-bottom d-none d-lg-block bg-theme">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-bar-wrap">
                            <div class="top-bar-left">
                                <div class="top-bar-text text-white"><b>THE GLASS PEOPLE</b> We’re Everywhere You Look</div>
                            </div>
                            <div class="top-bar-right">
                                <ul class="top-bar-info">
                                    <li class="info-item">
                                        <a href="tel:{{ preg_replace('/[^0-9]/', '', $Pcontact->phone ?? '5036908481') }}" class="info-link text-white">
                                            <i class="info-icon fa fa-phone"></i>
                                            <span class="info-text">
                                                <strong>{{ $Pcontact->phone ?? '(503) 690 8481' }}</strong>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="info-item text-white" style="    
    font-weight: bold;
    border-left: 1px solid #ddd;
    padding: 5px 10px;
    color: black;
    font-weight: bold;
    border-right: 1px solid #ddd;
    text-transform: uppercase;
    font-family: sans-serif;">
                                            <a href="{{ url('/home') }}" style="color: #7ac9ff !important;"><span>Agent Portal</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="header-bottom-wrap header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header position-relative">
                        <div class="header__logo">
                            <a href="{{ url('/home') }}">
                                <img src="{{ url('assets/images/logo/logo.png') }}" aria-label="The Glass People Logo" width="140" height="48" class="img-fluid light-logo" alt="The Glass People Logo">
                            </a>
                        </div>

                        <div class="header-right">
                            <div class="header__navigation menu-style-four d-none d-xl-block">
                                <nav class="navigation-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ url('/home') }}"><span>Home</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/about-us') }}"><span>About Us</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/services') }}"><span>Services</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/our-reviews') }}"><span>Our Reviews</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/blogs') }}"><span>Blogs</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/gallery') }}"><span>Gallery</span></a>
                                        </li>
                                        
                                        <li class="ht-btn text-uppercase" style="margin: 0px 25px;">
                                            <a href="{{ url('/contact-us') }}"><span>Contact us</span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="mobile-navigation-icon white-md-icon d-block d-xl-none" id="mobile-menu-trigger">
                                <i></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>