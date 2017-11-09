@extends('admin.layouts.update')

@section('page-name', 'Cap nhat benh vien')

@section('update-form')
<div style="padding-bottom: 20px; border-bottom: solid 1px;" id="toggle-content">
    <form class="form-horizontal" action="{!! route('admin.hospitals.update', ['hospital' => $hospital->id]) !!}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Ten:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhap vao ten" required="required" value="{!! $hospital->name !!}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">Dia chi:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" placeholder="Nhap vao dia chi" required="required" value="{!! $hospital->address !!}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Mo ta:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="Nhap vao mo ta">{!! $hospital->description !!}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="image">Hinh anh:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image" placeholder="Chon hinh anh">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="Cap nhat" />
            </div>
        </div>
    </form>
</div>
@endsection
