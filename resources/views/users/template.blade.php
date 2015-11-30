@extends('maket')

@section('content')

    <div class="row">
        <div class="col-sm-1"><h2>{{$title}}</h2>
        </div>
    </div>
    <hr>

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    @endif
    @yield('user')


@stop