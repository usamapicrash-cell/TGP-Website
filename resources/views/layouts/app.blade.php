<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Dynamic Title --}}
    <title>@yield('title') | {{ config('app.name') }}</title>

    {{-- Meta Description --}}
    <meta name="description" content="@yield('meta_description', 'Expert window glass repair and replacement services in Portland & Hillsboro. Custom shower doors, storefront glass, and mirror installation.')">

    {{-- SEO Keywords Tag (Add this line) --}}
    <meta name="keywords" content="@yield('meta_keywords', 'glass repair Portland, window glass replacement, custom shower doors, storefront glass repair')">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">

    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/images/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/images/android-chrome-512x512.png') }}">


    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    {{-- Vendor CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.min.css') }}">

    {{-- Main Style --}}
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">

    @stack('styles')
</head>

<body>

    {{-- Header --}}
    @include('layouts.partials.header')

    {{-- Main Content --}}
    <div id="main-wrapper">
        @yield('content')

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- JS Vendor --}}
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>

    {{-- Plugins --}}
    <script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script>

    {{-- Main JS --}}
    <script src="{{ asset('assets/js/main.js') }}?v={{ time() }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        $('#main-contact-form').on('submit', function(e) {
            e.preventDefault();
            
            let form = $(this);
            let submitBtn = form.find('button[type="submit"]');
            let originalText = submitBtn.html();
            
            submitBtn.prop('disabled', true).html('Processing... <i class="fa fa-spinner fa-spin"></i>');

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.responseText,
                        confirmButtonColor: '#2F437E'
                    });
                    form[0].reset();
                },
                error: function(xhr) {
                    let msg = "Something went wrong.";
                    if(xhr.status === 422) {
                        msg = xhr.responseJSON.errors.join("<br>");
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: msg
                    });
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });
    });
    </script>
    @stack('scripts')
</body>
</html>
