<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row top-header">
                <div class="col-md-3 col-sm-2 col-xs-12 top-content">
                    <div class="logo-image"></div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 top-content">
                    <div class="search-bar">
                        <form method="GET" action="./">
                            <div class="input-group">
                                <input type="text" class="form-control search-field" name="key" placeholder="Search for..." aria-label="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary search-icon" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 top-content">
                    <div class="social-bar">
                        <div class="social-item facebook">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </div>
                        <div class="social-item google-plus">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </div>
                        <div class="social-item twitter">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </div>
                        <div class="social-item youtube">
                            <i class="fa fa-youtube" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <div class="navbar-toggle top-menu" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <div class="menu-bar">
                            <div>Menu</div>
                            <div>
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse" style="padding: 0">
                    <ul class="nav navbar-nav" style="margin: 0">
                        <li class="navbar-item active"><a href="{{ route('login') }}">Trang chu</a></li>
                        <li class="navbar-item"><a href="{{ route('login') }}">Chuyen khoa</a></li>
                        <li class="navbar-item"><a href="{{ route('login') }}">Benh vien</a></li>
                        <li class="navbar-item"><a href="{{ route('login') }}">Cam nang</a></li>
                        <li class="navbar-item"><a href="{{ route('login') }}">Lien he</a></li>
                    </ul>
                </div>
            </nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </div>

        @yield('content')

        <div class="row footer">
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="footer-copyright">
                    Health care Viet Nam Copyright © 2017.
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
                <ul class="footer-menu">
                    <li>
                        <a href="">Trang chu</a>
                    </li>
                    <li>
                        <a href="">Thong tin</a>
                    </li>
                    <li>
                        <a href="">Cam nang</a>
                    </li>
                    <li>
                        <a href="">Lien he</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
