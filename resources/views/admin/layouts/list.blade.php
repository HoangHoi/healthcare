@extends('admin.layouts.app')

@section('body')
<div class="row">
    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
        @include('admin.includes.auth')
        @include('admin.includes.left-menu')
    </div>
    <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">

    <div class="panel panel-default">
        <div class="panel-heading flex flex-space-between flex-align-center">
            <div class="panel-title">
                <span>@yield('page-name')</span>
            </div>
            <div class="panel-control">
                <button type="button" class="btn btn-primary">Them moi</button>
            </div>
        </div>
        <div class="panel-body">
            <div class="create-form" id="create-form" style="display: block;">
                @yield('create-form')
            </div>
            @include('admin.includes.items-table')
        </div>
    </div>

    </div>
</div>
@endsection
