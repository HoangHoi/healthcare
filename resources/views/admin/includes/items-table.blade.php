<table class="table table-hover">
    <thead>
        <tr>
            @foreach($items['key'] as $key)
                <th>{!! $key !!}</th>
            @endforeach
            <th>Sua</th>
            <th>Xoa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items['data'] as $id => $item)
            <tr>
                @foreach($item as $value)
                    <td>{!! $value !!}</td>
                @endforeach
                <td>
                    <a href="{!! "{$baseUrl}/{$id}/update" !!}">
                        <button type="submit">
                                <i class="fa fa-pencil-square-o" aria-hidden="true" style="color: blue;"></i>
                        </button>
                    </a>
                </td>
                <td>
                    <form action="{!! "{$baseUrl}/{$id}/delete" !!}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit">
                            <i class="fa fa-times delete" data-id="{!! $id !!}" aria-hidden="true" style="color: red;"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
