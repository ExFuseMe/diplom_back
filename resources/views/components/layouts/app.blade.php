<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=pt-sans:400,700" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/notyf.js'])
    @vite(['resources/js/chart.js'])
</head>

@if(session()->has('success'))
    <script>
        window.laravelFlash = {
            success: @json(session()->get('success'))
        };
    </script>
@endif

@if(session()->has('error'))
    <script>
        window.laravelFlash = {
            error: @json(session()->get('error'))
        };
    </script>
@endif

@if($errors->any())
    <script>
        window.laravelFlash = {
            error: @json($errors->all())
        };
    </script>
@endif
<body class="bg-kpfu-black font-sans" style="font-family: 'PT Sans', sans-serif;">
{{$slot}}
</body>
</html>
