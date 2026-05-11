<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f0f2f5; color: #444; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
        .wrapper { max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        
        /* Smart & Minimal Header */
        .header { background-color: #34497e; color: #ffffff; padding: 20px; text-align: center; border-bottom: 3px solid #e67e22; }
        .header h1 { margin: 0; font-size: 20px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
        .header p { margin: 5px 0 0; font-size: 11px; opacity: 0.8; letter-spacing: 0.5px; }
        
        .content { padding: 35px 30px; }
        .greeting { font-size: 18px; color: #34497e; font-weight: bold; margin-bottom: 15px; }
        .main-text { font-size: 15px; line-height: 1.6; color: #555; margin-bottom: 25px; }
        
        .details-box { background: #f8fafc; padding: 18px; border-radius: 8px; font-size: 14px; border-left: 4px solid #34497e; margin-bottom: 30px; }
        
        .section-title { color: #34497e; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; display: flex; align-items: center; }
        .section-title::after { content: ""; flex: 1; height: 1px; background: #eee; margin-left: 15px; }

        /* Service Cards - Better Layout */
        .services-container { margin-bottom: 30px; font-size: 0; text-align: space-between; }
        .card { display: inline-block; width: 46%; margin: 2%; vertical-align: top; background: #fff; border: 1px solid #f0f0f0; border-radius: 10px; padding: 8px; text-align: center; box-sizing: border-box; }
        .card img { width: 100%; border-radius: 6px; height: 110px; object-fit: cover; }
        .card h4 { margin: 10px 0; font-size: 13px; color: #333; }
        
        /* Gallery Grid */
        .gallery-container { margin-bottom: 30px; font-size: 0; }
        .gallery-item { display: inline-block; width: 31%; margin: 1%; box-sizing: border-box; }
        .gallery-item img { width: 100%; border-radius: 8px; height: 90px; object-fit: cover; filter: brightness(0.95); transition: 0.3s; }

        .btn-wrapper { text-align: center; margin: 30px 0; }
        .btn { display: inline-block; padding: 12px 30px; background-color: #e67e22; color: #ffffff !important; text-decoration: none; border-radius: 50px; font-size: 14px; font-weight: bold; transition: background 0.3s; }
        
        .footer { background: #f8fafc; padding: 30px; text-align: center; border-top: 1px solid #eee; }
        .footer-logo { font-size: 16px; font-weight: bold; color: #34497e; margin-bottom: 10px; display: block; }
        .contact-info { font-size: 12px; color: #777; line-height: 1.8; margin-bottom: 15px; }
        .social-links a { color: #34497e; text-decoration: none; margin: 0 8px; font-size: 11px; font-weight: bold; }
        .copyright { margin-top: 20px; font-size: 10px; color: #bbb; text-transform: uppercase; letter-spacing: 1px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>The Glass People</h1>
            <p>ESTABLISHED & TRUSTED GLAZING SOLUTIONS</p>
        </div>

        <div class="content">
            <div class="greeting">Hi {{ $details['first_name'] }},</div>
            <p class="main-text">
                Thank you for choosing <strong>The Glass People</strong>. We have received your request for <strong>{{ $details['service_type'] }}</strong>. Our team is currently reviewing your details and will contact you within 24 hours.
            </p>

            <div class="details-box">
                <strong style="color:#34497e; display:block; margin-bottom:5px;">Your Enquiry Message:</strong>
                {{ $details['message'] }}
            </div>

            @if($extra['services']->count() > 0)
            <div class="section-title">Our Services</div>
            <div class="services-container">
                @foreach($extra['services'] as $service)
                <div class="card">
                    <img src="{{ url($service->image) }}" alt="{{ $service->label }}">
                    <h4>{{ $service->label }}</h4>
                </div>
                @endforeach
            </div>
            @endif

            @if($extra['gallery']->count() > 0)
            <div class="section-title">Recent Work</div>
            <div class="gallery-container">
                @foreach($extra['gallery'] as $item)
                <div class="gallery-item">
                    <img src="{{ url($item->image) }}" alt="Project">
                </div>
                @endforeach
            </div>
            @endif

            <div class="btn-wrapper">
                <a href="{{ url('/') }}" class="btn">Explore All Projects</a>
            </div>
        </div>

        <div class="footer">
            <span class="footer-logo">The Glass People</span>
            <div class="contact-info">
                {{ $extra['contact']->address ?? 'Address not set' }}<br>
                <strong>Tel:</strong> {{ $extra['contact']->phone ?? '' }} | <strong>WA:</strong> {{ $extra['contact']->whatsapp ?? '' }}<br>
                <strong>Email:</strong> {{ $extra['contact']->email ?? '' }}
            </div>
            <div class="social-links">
                @if($extra['contact']->facebook)<a href="{{ $extra['contact']->facebook }}">FACEBOOK</a>@endif
                @if($extra['contact']->instagram)<a href="{{ $extra['contact']->instagram }}">INSTAGRAM</a>@endif
                @if($extra['contact']->linkedin)<a href="{{ $extra['contact']->linkedin }}">LINKEDIN</a>@endif
            </div>
            <div class="copyright">
                &copy; {{ date('Y') }} THE GLASS PEOPLE. ALL RIGHTS RESERVED.
            </div>
        </div>
    </div>
</body>
</html>