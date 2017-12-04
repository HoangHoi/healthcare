@extends('admin.layouts.update')

@section('page-name', 'Cap nhat chuyen khoa')

@section('update-form')
<div style="padding-bottom: 20px; border-bottom: solid 1px;" id="toggle-content">
    <form class="form-horizontal" action="{!! route('admin.specialists.update', ['specialist' => $specialist->id]) !!}" id="chuyen-khoa-form" enctype="multipart/form-data" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Ten:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhap vao ten" value="{!! $specialist->name !!}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Mo ta:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="Nhap vao mo ta">{!! $specialist->description !!}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Cap nhat</button>
            </div>
        </div>
    </form>
</div>
@endsection
