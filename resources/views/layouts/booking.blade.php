@extends('layouts.app')

@section('body')
<div class="row">
    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
        @include('includes.left-menu-description')
    </div>
    <div class="col-lg-6 col-md-6 col-sm-9 col-xs-12">
        @yield('content')
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
        @include('includes.right-menu-info')
    </div>
</div>
@endsection
