<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">HealcareVN</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{!! route('admin.doctors.index') !!}">Bac sy</a></li>
                <li><a href="{!! route('admin.hospitals.index') !!}">Benh vien</a></li>
                <li><a href="{!! route('admin.specialists.index') !!}">Chuyen khoa</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li>
                        <a>
                            <span>Chao mung </span>
                            <span style="font-weight: 900; color: blue;">{!! Auth::user()->name !!}</span>
                        </a>
                    </li>
                    <li><a href="{!! route('admin.logout') !!}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                @endauth
                @guest
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
