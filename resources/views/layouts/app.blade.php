<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width"/>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"/>

    <script src='{{ asset('js/jquery-1.8.3.min.js') }}'></script>
    <script src="{{ asset('js/html5.js') }}"></script>
    <script src="{{ asset('js/radio.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/checkbox.js') }}"></script>
    <script src="{{ asset('js/selectBox.js') }}"></script>
    <script src="{{ asset('js/jquery.carouFredSel-6.2.0-packed.js') }}"></script>
    <script src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('js/jquery.jqzoom-core.js') }}"></script>
    <script src="{{ asset('js/jquery.transit.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.2.js') }}"></script>
    <script src="{{ asset('js/jquery.anythingslider.js') }}"></script>
    <script src="{{ asset('js/jquery.anythingslider.fx.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>--}}
</head>

<body>
@include('partials._top')
@include('partials._header')
@include('partials.breadcrumbs')

<div class="container">@yield('content')</div>

@include('partials._footer')
@yield('end_script')
<script>
    @if(auth()->check())
    var userId = {{ auth()->id() }};
    @else
    var userId = null;
    @endif

    // Store the session ID and user ID in local storage
    localStorage.setItem('sessionId', '{{ session()->getId() }}');
    localStorage.setItem('userId', userId);
</script>
</body>

</html>
