<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
<div id="toasts"></div>
<h1>adminlayout</h1>
<div class="container">@yield('content')</div>


@yield('end_script')
<script>

</script>
</body>
</html>
