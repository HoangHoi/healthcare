<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app">
        <div class="container">
            @include('includes.header')
            @include('includes.top-menu')
            @include('includes.banner')
            @include('includes.breadcrumb')
        </div>
        <div class="container">
            @yield('body')
        </div>
        <div class="container">
            @include('includes.footer')
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://uhchat.net/code.php?f=814d18"></script>
    @stack('scripts')
</body>
</html>
