<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    @include('partials._header')

    <div class="container">
        @yield('content')
    </div>

    @include('partials._footer')
</body>
</html>
