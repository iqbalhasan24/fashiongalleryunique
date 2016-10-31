@extends('laravel-authentication-acl::admin.layouts.baseauth')
@section('title')
Admin login
@stop
@section('container')

<div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title bariol-bold">Login to {!!Config::get('acl_base.app_name')!!} AWS Reseller Portal</h3>
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
                {!! Form::open(array('url' => URL::route("user.login.process"), 'method' => 'post') ) !!}
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

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required', 'autocomplete' => 'off']) !!}
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        Remember me {!! Form::checkbox('remember') !!}
                    </label>
                </div>                
                <input type="submit" value="Login" class="btn btn-info btn-block">
                {!! Form::close() !!}
                <div class="row">
                    <div class="col-sm-6 margin-top-10">
                        {!! link_to_route('user.recovery-password','Forgot password?') !!}
                    </div>
                    <div class="col-sm-6 margin-top-10 text-right">                        
                        <a id="example" href="javascript:void(0);" placement="top" data-container="body" data-toggle="popover" title="Forgot username?" data-content="Your Email address is your username.">Forgot username?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer_scripts')
<script>
    jQuery("#email").focus();
    jQuery('#example').popover()
</script>
@stop