@extends('admin.layouts.list')

@section('page-name', 'Danh sach chuyen khoa')

@section('create-form')
<div style="padding-bottom: 20px; border-bottom: solid 1px;" id="toggle-content">
    <form class="form-horizontal" action="{!! route('admin.specialists.create') !!}" id="chuyen-khoa-form" enctype="multipart/form-data" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Ten:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhap vao tem">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Mo ta:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="Nhap vao mo ta"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Them</button>
            </div>
        </div>
    </form>
</div>
@endsection
