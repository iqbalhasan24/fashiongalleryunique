@extends('laravel-authentication-acl::client.layouts.base')
@section ('title')
Password recovery success
@stop
@section('container')

<center>
    <br>

        <h1>Password changed successfully</h1>
        <p>
            Your password has been changed succesfully. Now you can login to our site.
            <a href="{!! URL::to('/') !!}"><i class="fa fa-home"></i> Go to homepage</a>
            <br><br><br><br><br><br><br><br><br>
        </p>
</center>
@stop