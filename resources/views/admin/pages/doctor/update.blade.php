@extends('admin.layouts.update')

@section('page-name', 'Cap nhat bac sy')

@section('update-form')
<div style="padding-bottom: 20px; border-bottom: solid 1px;" class="update-form">
    <form class="form-horizontal" action="{!! route('admin.doctors.update', ['doctor' => $doctor->id]) !!}" enctype="multipart/form-data" method="POST">
        {!! csrf_field() !!}
        <div class="avatar">
            <div class="avatar-image" style="background-image: url('{!! $doctor->avatar !!}');"></div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="avatar">Avatar:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="avatar" name="avatar"/>
            </div>
        </div>

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
            <label class="control-label col-sm-2" for="info">Gioi thieu:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="info" name="info" placeholder="Nhap thong tin bac sy">{!! $doctor->info !!}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Cap nhat</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('other-content')
    <div class="panel panel-default time-list" id="time-list">
        <div class="panel-heading flex flex-space-between flex-align-center">
            <div class="panel-title">
                <span>Thoi gian kham trong tuan</span>
            </div>
            {{-- <div class="panel-control">
                <button type="button" class="btn btn-primary" id="toggle-button" data-toggle-content="toggle-content">Them moi</button>
            </div> --}}
        </div>
        <div class="panel-body">
            @if (session('action'))
                <div class="alert alert-{!! session('status') !!}">
                    {{ session('message') }}
                </div>
            @endif
            @include('admin.includes.form-create-time')
            @include('admin.includes.time-table')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>var appUrl = "{!! env('APP_URL') !!}"</script>
    <script src="{!! mix('js/time-list.js') !!}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
