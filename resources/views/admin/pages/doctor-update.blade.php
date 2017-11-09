@extends('admin.layouts.update')

@section('page-name', 'Cap nhat bac sy')

@section('update-form')
<div style="padding-bottom: 20px; border-bottom: solid 1px;">
    <form class="form-horizontal" action="{!! route('admin.doctors.update', ['doctor' => $doctor->id]) !!}" enctype="multipart/form-data" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Ten:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhap vao ten" required="required" value="{!! $doctor->name !!}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Benh vien:</label>
            <div class="col-sm-10">
                <select class="form-control" name="hospital_id">
                    @foreach($hospitals as $hospital)
                        <option value="{!! $hospital->id !!}" {!! $doctor->hospital_id == $hospital->id ? 'selected' : '' !!}>{!! $hospital->name !!}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Chuyen khoa:</label>
            <div class="col-sm-10">
                <select class="form-control" name="specialist_id">
                    @foreach($specialists as $specialist)
                        <option value="{!! $specialist->id !!}" {!! $doctor->specialist_id == $specialist->id ? 'selected' : '' !!}>{!! $specialist->name !!}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="examination-fee">Gia kham:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="examination-fee" name="examination_fee" placeholder="Nhap vao gia kham" required="required"  value="{!! $doctor->examination_fee !!}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="avatar">Avatar:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="avatar" name="avatar"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="info">Gioi thieu:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="info" name="info" placeholder="Nhap thong tin bac sy">{!! $doctor->info !!}</textarea>
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
