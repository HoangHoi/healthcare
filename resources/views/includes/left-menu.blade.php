<div class="panel panel-default">
    <div class="panel-body body-content">
        @if(isset($specialists))
            <div class="left-menu">
                <div class="menu-title">
                    Chuyên khoa
                </div>
                <ul class="menu-body">
                    @foreach($specialists as $specialist)
                        <li {!! (isset($specialist['menuActived']) && $specialist['menuActived']) ? 'class="active"' : ''!!}>
                            <a href="{!! route('specialist.show', ['specialistName' => $specialist['slug'], 'specialist' => $specialist['id']]) !!}">{!! $specialist['name'] !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(isset($hospitals))
            <div class="left-menu">
                <div class="menu-title">
                    Bệnh viện
                </div>
                <ul class="menu-body">
                    @foreach($hospitals as $hospital)
                        <li {!! (isset($hospital['menuActived']) && $hospital['menuActived']) ? 'class="active"' : ''!!}>
                            <a href="{!! route('hospital.show', ['hospitalName' => $hospital['slug'], 'hospital' => $hospital['id']]) !!}">{!! $hospital['name'] !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
