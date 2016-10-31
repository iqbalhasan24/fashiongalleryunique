@extends('admin.layouts.base-1cols')

@section('title')
Partnership | Partnership
@stop

@section('content')

<?php $user_group = strtolower($user->groups()->first()->name); ?>


<div class="container" >    
    <!-- Indicators -->       
    @if($page->banner_type != 'slider')     
       
        <div class="row">
            <div class="col-md-12">
                 <img src="{{asset($page->banner_image)}}"  width="100%"  style="margin:0px;">
            </div>
        </div>
      
    @else 
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol style="margin-bottom: 30px;" class="carousel-indicators">
                @foreach( $sliders as $key => $slide)
                <li data-target="#myCarousel" data-slide-to="{{ $key }}" @if($key == 0)class="active" @endif></li>        
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach( $sliders as $key => $slide )
                <div class="item @if($key == 0) active @endif">
                    <div class="slides"  style='height:380px;background: rgba(0, 0, 0, 0) url("/{{ $slide->image }}") no-repeat scroll 0 0 / contain ;'>
                       <!--  <h1>{!! $slide->title !!}</h1> -->
                       <!-- <p>{!! $slide->content !!}</p> -->
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Banner end-->
        </div>    
    @endif      
    <!-- Controls -->
    
</div>

<!-- Banner end-->

<!-- Begin page content -->
<div class="container"> 
    <div class="row">

        <div class="col-md-12">
            <div class=" paddedTop drak-grey">
                <h2>{!! $page->banner_description !!}</h2>

            </div>
        </div>
        <div class="col-md-12 ">
            <div class="gray-bg small-grey  text-center">
                <h4>{!! $page->short_description !!}</h4>
            </div>
        </div>
    </div>

   
    {!! $page->content !!}   <!-- total page content -->
    

</div>
@stop
