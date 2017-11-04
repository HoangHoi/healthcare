<table class="table table-hover">
    <thead>
        <tr>
            @foreach($items['key'] as $key)
                <th>{!! $key !!}</th>
            @endforeach
            <th>Xoa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items['data'] as $id => $item)
            <tr>
                @foreach($item as $value)
                    <td>{!! $value !!}</td>
                @endforeach
                <td><i class="fa fa-times delete" data-id="{!! $id !!}" aria-hidden="true" style="color: red;"></i></td>
            </tr>
        @endforeach
    </tbody>
</table>
