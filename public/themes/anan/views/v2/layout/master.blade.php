<!DOCTYPE html>
<html lang="en">
<head>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link data-minify="1" rel='stylesheet' id='awe-style-css' href='{{ Theme::url('assets/css/font-awesome.min.css') }}'
          type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/style.css')) }}" rel="stylesheet" />
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/customize.css')) }}" rel="stylesheet" />
    @stack('styles')

    {!! setting('custom_header_assets') !!}
</head>
<body>
@include('v2.layout.header')
@yield('content')
@include('v2.layout.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script type="text/javascript" src="{{ v(Theme::url('assets/v2/js/js.js')) }}"></script>
<script type='text/javascript' src='{{ Theme::url('assets/v2/js/search-product.js') }}' defer></script>
@stack('scripts')

{!! setting('custom_footer_assets') !!}
</body>

</html>