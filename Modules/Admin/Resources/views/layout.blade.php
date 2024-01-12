<!DOCTYPE html>
<html lang="{{ locale() }}">
    <head>
        <base href="{{ url('/') }}">
        <meta charset="UTF-8">
        <title>
            @yield('title') - {{ setting('store_name') }}
        </title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto:400,500" rel="stylesheet">
        @yield('css-add')
        @foreach ($assets->allCss() as $css)
            <link media="all" type="text/css" rel="stylesheet" href="{{ v($css) }}">
        @endforeach
        <style>
             .media-picker-modal{
                z-index: 1500 !important;
            }
        </style>
        @stack('styles')

        @include('admin::partials.globals')
    </head>

    <body class="skin-blue sidebar-mini offcanvas clearfix {{ is_rtl() ? 'rtl' : 'ltr' }}">
        <div class="left-side"></div>

        @include('admin::partials.sidebar')

        <div class="wrapper">
            <div class="content-wrapper">
                @include('admin::partials.top_nav')

                <section class="content-header clearfix">
                    @yield('content_header')
                </section>

                <section class="content">
                    @include('admin::partials.notification')

                    @yield('content')
                    <input type="hidden" name="over_image" id="over_image" class="image-picker-tiny">
                </section>

                <div id="notification-toast"></div>
            </div>
        </div>

        @include('admin::partials.footer')

        @include('admin::partials.confirmation_modal')

        @foreach ($assets->allJs() as $js)
            <script src="{{ v($js) }}"></script>
        @endforeach

        @stack('scripts')
        @yield('scripts-add')
    </body>
</html>
