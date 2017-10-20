@extends('layouts.app')

@section('body')
<div class="row">
    <div class="col-md-3 hidden-sm hidden-xs">
        @include('includes.left-menu')
    </div>
    <div class="col-md-6 col-sm-8 col-xs-12">
        @yield('content')
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12">
        @include('includes.right-menu')
    </div>
</div>
@endsection
