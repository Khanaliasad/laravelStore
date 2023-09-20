<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width" />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
        window.jQuery ||
            document.write(
                '<script src='
                {{ asset('js/jquery-1.8.3.min.js') }} '><\/script>'
            );
    </script>
    <script src="{{ asset('js/html5.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/radio.js') }}"></script>
    <script src="{{ asset('js/checkbox.js') }}"></script>
    <script src="{{ asset('js/selectBox.js') }}"></script>
    <script src="{{ asset('js/jquery.carouFredSel-6.2.0-packed.js') }}"></script>
    <script src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('js/jquery.jqzoom-core.js') }}"></script>
    <script src="{{ asset('js/jquery.transit.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.2.js') }}"></script>
    <script src="{{ asset('js/jquery.anythingslider.js') }}"></script>
    <script src="{{ asset('js/jquery.anythingslider.fx.js') }}"></script>
</head>

<body>
    @include('partials._top')
    @include('partials._header')
    @include('partials.breadcrumbs')

    <div class="container">@yield('content')</div>

    @include('partials._footer')
</body>

</html>
