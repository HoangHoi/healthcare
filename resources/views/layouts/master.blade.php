@extends('layouts.app')

@section('body')
<div class="row">
    {{-- <div class="col-md-3 hidden-sm hidden-xs">
        @include('includes.left-menu')
    </div> --}}
    <div class="col-md-9 col-sm-12 col-xs-12">
        @yield('content')
    </div>
    <div class="col-md-3 hidden-sm hidden-xs">
        @include('includes.right-menu-info')
    </div>
</div>
@endsection
