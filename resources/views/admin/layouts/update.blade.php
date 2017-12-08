@extends('admin.layouts.app')

@section('body')
<div class="row">
    {{-- <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
        @include('admin.includes.auth')
        @include('admin.includes.left-menu')
    </div> --}}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading flex flex-space-between flex-align-center">
                <div class="panel-title">
                    <span>@yield('page-name')</span>
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
                <div class="update-form" id="update-form" style="display: block;">
                    @yield('update-form')
                </div>
            </div>
        </div>
        @yield('other-content')
    </div>
</div>
@endsection
