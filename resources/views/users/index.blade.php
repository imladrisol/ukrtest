@extends('users.template')

@section('user')

    <div class="row">
        <div class="col-sm-1"><b>Username</b></div>
        <div class="col-sm-8"><b>Password</b></div>
        <div class="col-sm-1">&nbsp;</div>
        <div class="col-sm-1">&nbsp;</div>
    </div>
        @foreach($users as $user)
            <div class="row">
                <div class="col-sm-1 ">{{$user->username}}</div>
                <div class="col-sm-8">{{$user->password}}</div>
                <div class="col-sm-1">
                    {!! Form::open(array('route' => array('user.destroy', $user->id), 'method' => 'delete')) !!}
                    <button type="submit" class="btn btn-danger btn-mini"><span class="glyphicon glyphicon-remove"></span> </button>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-1">
                    {!! Form::open(array('route' => array('user.edit', $user->id), 'method' => 'get')) !!}
                    <button type="submit" class="btn btn-danger btn-mini"><span class="glyphicon glyphicon-pencil"></span></button>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-sm-12"><b>Deleted users</b></div>
        </div>
        @foreach($users_trashed as $trash)
            <div class="row">
                <div class="col-sm-1">{{$trash->username}}</div>
                <div class="col-sm-8">{{$trash->password}}</div>
                <div class="col-sm-1">
                    {!! Form::open(array('route' => array('user.delTrash', $trash->id), 'method' => 'delete')) !!}
                    <button type="submit" class="btn btn-danger btn-mini"><span class="glyphicon glyphicon-remove"></span> </button>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-1">
                    {!! Form::open(array('route' => array('user.restore', $trash->id), 'method' => 'get')) !!}
                    <button type="submit" class="btn btn-danger btn-mini"><span class="glyphicon glyphicon-upload"></span> </button>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach

@stop