@extends('laravel-authentication-acl::client.layouts.base')
@section('title')
Change password
@stop
@section('container')


<div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-bold">Change password</h3>
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
                    {!! Form::open(array('url' => URL::route("user.reminder.process"), 'method' => 'post') ) !!}
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'New password', 'required', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::hidden('email',$email) !!}
                    {!! Form::hidden('token',$token) !!}
                    <input id="submit" type="submit" value="Change password" class="btn btn-info btn-block">
                    {!! Form::close() !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 margin-top-10">
                            {!! link_to_route('user.login','Back to login') !!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

{{--<div class="logo" style="background-image:url(/images/change_password.png)"></div>
<div class="login-form">
    {!! Form::open(array('url' => URL::route("user.reminder.process"), 'method' => 'post') ) !!}

    {!! Form::label('password', 'New password: ') !!}

    {!! Form::password('password', ['id' => 'password', 'class' => 'input', 'placeholder' => 'New password', 'required', 'autocomplete' => 'off']) !!}

    <input id="submit" type="submit" value="Change password">
    {!! Form::hidden('email',$email) !!}
    {!! Form::hidden('token',$token) !!}
    {!! Form::close() !!}
</div>
--}}
@stop