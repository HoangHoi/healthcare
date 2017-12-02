<ol class="breadcrumb">
    @foreach($breadcrumb as $item)
        @if ($item['is_active'])
            <li class="breadcrumb-item active">{!! $item['name'] !!}</li>
        @else
            <li class="breadcrumb-item"><a href="{!! route($item['route_name'], $item['route_params']) !!}">{!! $item['name'] !!}</a></li>
        @endif
    @endforeach
</ol>
