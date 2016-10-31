@extends('laravel-authentication-acl::client.layouts.base')
@section ('title')
Password recovery
@stop
@section('container')
<div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title bariol-bold">Password recovery</h3>
            </div>
            <?php $message = Session::get('message'); ?>
            @if( isset($message) )
            <div class="alert alert-success">{{$message}}</div>
            @endif
            @if($errors && ! $errors->isEmpty() )
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @endif
            <div class="panel-body">
                {!! Form::open(array('url' => URL::route("user.reminder"), 'method' => 'post') ) !!}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                {!! Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autocomplete' => 'off']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Recover" class="btn btn-info btn-block">
                {!! Form::close() !!}
                <br>
                <a href="{!! URL::route('user.login') !!}"><i class="fa fa-arrow-left"></i> Back to login</a>
            </div>
        </div>
    </div>
</div>
@stop