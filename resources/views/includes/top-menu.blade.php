<nav class="navbar navbar-default">
    <div class="navbar-header">
        <div class="navbar-toggle top-menu" data-toggle="collapse" data-target="#app-navbar-collapse">
            <div class="menu-bar">
                <div>Danh mục</div>
                <div>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse" style="padding: 0">
        <ul class="nav navbar-nav" style="margin: 0">
            <li class="navbar-item {!! $topActive == 0 ? 'active' : '' !!}"><a href="{!! route('home') !!}">Trang chủ</a></li>
            <li class="navbar-item {!! $topActive == 1 ? 'active' : '' !!}"><a href="{!! route('booking.index') !!}">Đặt lịch khám</a></li>
            <li class="navbar-item {!! $topActive == 2 ? 'active' : '' !!}"><a href="{!! route('hospital.index') !!}">Bệnh viện</a></li>
            <li class="navbar-item {!! $topActive == 3 ? 'active' : '' !!}"><a href="{!! route('specialist.index') !!}">Chuyen Khoa</a></li>
            <li class="navbar-item {!! $topActive == 4 ? 'active' : '' !!}"><a href="{!! route('home') !!}">Cẩm nang</a></li>
            <li class="navbar-item {!! $topActive == 5 ? 'active' : '' !!}"><a href="{!! route('home') !!}">Liên hệ</a></li>
        </ul>
    </div>
</nav>
