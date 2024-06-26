<!DOCTYPE html>
<html lang="{{ locale() }}">

<head>
    {!! SEO::generate() !!}
    <base href="{{ config('app.url') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="canonical" href="{{ Request::url() }}" />
    <title>
        @hasSection('title')
            @yield('title') - {{ setting('store_name') }}
        @else
            {{ setting('store_name') }}
        @endif
    </title>

    @stack('meta')

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap" rel="stylesheet">

    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='owl-style-css' href='{{ Theme::url('assets/css/owl.carousel.min.css') }}' type='text/css'
          media='all' />
    <link rel='stylesheet' id='owl-style1-css' href='{{ Theme::url('assets/css/owl.theme.default.min.css') }}'
          type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-style-css' href='{{ Theme::url('assets/css/bootstrap.min.css') }}'
          type='text/css' media='all' />

    <link rel="stylesheet" href="{{ v(Theme::url('assets/v2/font/fontawesome-free-5.15.4/css/all.min.css')) }}" />

    <link data-minify="1" rel='stylesheet' id='awe-style-css' href='{{ Theme::url('assets/css/font-awesome.min.css') }}'
          type='text/css' media='all' />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('mid-styles')

    <link data-minify="1" rel='stylesheet' id='az-ntl-style-css' href='{{ Theme::url('assets/css/az-ntl8e25.css') }}'
          type='text/css' media='all' />
    <link data-minify="1" rel='stylesheet' id='az-huy-style-css' href='{{ Theme::url('assets/css/az-huy8e25.css') }}'
          type='text/css' media='all' />
    <link data-minify="1" rel='stylesheet' id='custom-style-css' href='{{ Theme::url('assets/css/custom8e25.css') }}'
          type='text/css' media='all' />
    <!-- trang category -->
    <link data-minify="1" rel='stylesheet' id='wpos-slick-style-css' href='{{ Theme::url('assets/css/slick.css') }}'
          type='text/css' media='all' />
    <link data-minify="1" rel='stylesheet' id='wcpscwc_public_style-css'
          href='{{ Theme::url('assets/css/wcpscwc-publica14f.css') }}' type='text/css' media='all' />
    <link rel="stylesheet" href="{{ Theme::url('assets/css/css.css') }}">
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/header.css')) }}" rel="stylesheet" />
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/footer.css')) }}" rel="stylesheet" />
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/customize.css')) }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ v(Theme::url('assets/css/customize.css')) }}">
    <link rel="stylesheet" href="{{ v(Theme::url('assets/v2/css/mix_customize.css')) }}">
    <link rel="shortcut icon" href="{{ $favicon ?? '' }}" type="image/x-icon">

    <style>
        .row.az-ft-box .box.box-content-1:before {
            background-image: url("{{ getImage( setting('anan_footer_section_one_image_1') ) }}");
            width: 55px;
            height: 65px;
        }

        .row.az-ft-box .box.box-content-2:before {
            background-image: url("{{ getImage( setting('anan_footer_section_one_image_2') ) }}");
            width: 73px;
            height: 64px;
        }

        .row.az-ft-box .box.box-content-3:before {
            background-image: url("{{ getImage( setting('anan_footer_section_one_image_3') ) }}");
            width: 55px;
            height: 55px;
        }

        .scrollup {
            margin-right: -4.3rem;
        }

        .nav-item-top-side-menu {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul.az-nav-phone li a {
            padding-left: 5px  !important;
        }

        div#load-data ul li img,#load-data-mobile  ul li img {
            width: 50px;
        }
        div#load-data ul li .prod-info {
            padding-left: 0;
        }
        div#load-data ul li .prod-info .price,#load-data-mobile ul li .prod-info .price{
            color: red;
            font-size: 16px;
            font-weight: bold;
        }

        div#load-data ul li .prod-info .price del,#load-data-mobile ul li .prod-info .price del{
            color: #858584;
            font-size: 14px;
            font-weight: bold;
        }
        div#load-data,#load-data-mobile {
            border: 1px solid #cecece;
        }
        div#load-data ul,#load-data-mobile ul{
            margin-bottom: 0;
        }

        #load-data-mobile{
            max-height: 500px;
            overflow-y: scroll;
        }



    </style>
    @stack('styles')

    {!! setting('custom_header_assets') !!}


    {{-- {!! $schemaMarkup->toScript() !!} --}}


    @routes
</head>

<body class="@yield('body_class')" id="@yield('body_id')">
@include('v2.layout.header')
<div class="wrapper">
    @yield('content')
    @include('v2.layout.footer')
{{--    @include('public.layout.footer')--}}
</div>

@stack('pre-scripts')

<!--Start of Tawk.to Script-->
<script type="text/javascript" src="{{ v(Theme::url('assets/v2/js/jquery.min.js')) }}"></script>

{{-- <script type='text/javascript' src='{{ Theme::url('assets/js/jquery.minaf6c.js') }}' id='jquery-core-js' defer>
</script> --}}
{{-- <script src="{{ Theme::url('assets/js/a7fdd.js') }}" defer></script> --}}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type='text/javascript' src='{{ Theme::url('assets/js/owl.carousel.min.js') }}' id='owl-script-js' defer>
</script>
<script type='text/javascript' src='{{ Theme::url('assets/js/az.carousel.js') }}' id='az-owl-script-js' defer>
</script>
<script type='text/javascript' src='{{ Theme::url('assets/js/bootstrap.min.js') }}' id='pv-bootstrap-script-js'
        defer></script>
{{-- <script type='text/javascript' src='{{ Theme::url('assets/js/custom.js') }}' id='tanpv-js-js' defer></script>
--}}
<script type='text/javascript' src='{{ Theme::url('assets/js/ntl-js.js') }}' id='ntl-js-script-js' defer></script>

<!-- trang category -->
<script type='text/javascript' src='{{ Theme::url("assets/js/wp-embed.min.js") }}' id='wp-embed-js' defer></script>
<script type='text/javascript' src='{{ Theme::url("assets/js/slick.min.js") }}' id='wpos-slick-jquery-js' defer>
</script>
<script type='text/javascript' id='wcpscwc-public-jquery-js-extra'>
    /* <![CDATA[ */
    var Wcpscwc = {"is_avada":"0"};
    /* ]]> */
</script>
<script type='text/javascript' src='{{ Theme::url("assets/js/public.js") }}' id='wcpscwc-public-jquery-js' defer>
</script>
<!-- trang product detail -->
<script type='text/javascript' id='wc-single-product-js-extra'>
    /* <![CDATA[ */
    var wc_single_product_params = {"i18n_required_rating_text":"Vui l\u00f2ng ch\u1ecdn m\u1ed9t m\u1ee9c \u0111\u00e1nh gi\u00e1","review_rating_required":"yes","flexslider":{"rtl":false,"animation":"slide","smoothHeight":true,"directionNav":false,"controlNav":"thumbnails","slideshow":false,"animationSpeed":500,"animationLoop":false,"allowOneSlide":false},"zoom_enabled":"","zoom_options":[],"photoswipe_enabled":"1","photoswipe_options":{"shareEl":false,"closeOnScroll":false,"history":false,"hideAnimationDuration":0,"showAnimationDuration":0},"flexslider_enabled":"1"};
    /* ]]> */
</script>
<script type='text/javascript' src='{{ v(Theme::url("assets/js/single-product.min.js")) }}' id='wc-single-product-js'
        defer></script>
<script type="text/javascript" src="{{ v(Theme::url('assets/v2/js/bootstrap.bundle.min.js')) }}"></script>

<script type="text/javascript" src="{{ v(Theme::url('assets/v2/js/menu.js')) }}"></script>
<script type='text/javascript' src='{{ v(Theme::url('assets/v2/js/search-product.js')) }}' defer></script>

@stack('scripts')

{!! setting('custom_footer_assets') !!}
</body>

</html>