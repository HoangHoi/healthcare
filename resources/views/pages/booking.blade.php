@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('includes.left-menu')
        <div class="col-md-6 col-sm-8 col-xs-12">
            @include('includes.schedule')
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
            @include('includes.right-menu')
        </div>
    </div>
</div>
@endsection
