<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app" style="margin-top: 15px;">
        <div class="container">
            @yield('body')
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>
