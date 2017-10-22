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
            <li class="navbar-item {!! $topActive == 0 ? 'active' : '' !!}"><a href="{!! route('home') !!}">Trang chu</a></li>
            <li class="navbar-item {!! $topActive == 1 ? 'active' : '' !!}"><a href="{!! route('booking.index') !!}">Dat lich kham</a></li>
            <li class="navbar-item {!! $topActive == 2 ? 'active' : '' !!}"><a href="#">Benh vien</a></li>
            <li class="navbar-item {!! $topActive == 3 ? 'active' : '' !!}"><a href="#">Cam nang</a></li>
            <li class="navbar-item {!! $topActive == 4 ? 'active' : '' !!}"><a href="#">Lien he</a></li>
        </ul>
    </div>
</nav>
