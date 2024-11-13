<!DOCTYPE html>
<html lang="en">
<head>
    {!! SEO::generate() !!}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="{{ Request::url() }}" />
    <title>
        @hasSection('title')
            @yield('title') - {{ setting('store_name') }}
        @else
            {{ setting('store_name') }}
        @endif
    </title>

    @stack('meta')
    <link rel="shortcut icon" href="{{ $favicon ?? '' }}" type="image/x-icon">
    <link href="{{ v(Theme::url('assets/v2/css/bootstrap.min.css')) }}" rel="stylesheet" />
    <link href="{{ v(Theme::url('assets/v2/font/font_roboto.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ v(Theme::url('assets/v2/font/fontawesome-free-5.15.4/css/all.min.css')) }}" />
    <link rel="stylesheet" href="{{ v(Theme::url('assets/v2/font/font-awesome4.7.0/css/font-awesome.css')) }}" />
    <link rel="stylesheet" href="{{ v(Theme::url('assets/v2/slick-1.8.1/slick/slick-theme.css')) }}" />
    <link rel="stylesheet" href="{{ v(Theme::url('assets/v2/slick-1.8.1/slick/slick.css')) }}" />
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/style.css')) }}" rel="stylesheet" />
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/root-review.css')) }}" rel="stylesheet" />
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/customize.css')) }}" rel="stylesheet" />
    @stack('styles')

    {!! setting('custom_header_assets') !!}
</head>
<body>
@include('v2.layout.header')
@yield('content')
@include('v2.layout.footer')
<script type="text/javascript" src="{{ v(Theme::url('assets/v2/js/bootstrap.bundle.min.js')) }}"></script>
<script type="text/javascript" src="{{ v(Theme::url('assets/v2/js/jquery.min.js')) }}"></script>
<script type="text/javascript" src="{{ v(Theme::url('assets/v2/slick-1.8.1/slick/slick.min.js')) }}"></script>
<script type="text/javascript" src="{{ v(Theme::url('assets/v2/js/js.js')) }}"></script>
<script type='text/javascript' src='{{ v(Theme::url('assets/v2/js/search-product.js')) }}' defer></script>
@stack('scripts')

{!! setting('custom_footer_assets') !!}
</body>

</html>