@extends('admin.layouts.base-1cols')

@section('title')
    {!! $page->title !!}
@stop

@section('content')

<?php $user_group = strtolower($user->groups()->first()->name); ?>

<div class="container" >    
    <!-- Indicators -->       
    @if($page->banner_type != 'slider')     
       
        <div class="row">
            <div class="col-md-12">
                <div style='background: rgba(0, 0, 0, 0) url("/{!! $page->banner_image!!}") repeat scroll right top / cover;height: 458px;'>             
                   <!--  {!! $page->banner_description !!}    -->     
                </div>
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
<!---end--->




<!-- Begin page content -->
<div class="container"> 
    <div class="row">

        <div class="col-md-12">
            <div class=" paddedTop drak-grey">
                <h2>{!! $page->content !!}</h2>

            </div>
        </div>
        <div class="col-md-12 ">
            <div class="gray-bg small-grey  text-center">
                <h4>{!! $page->short_description !!} </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 wc-details-con">

            {!! $page->documentation_details !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 wc-details-con-02">
            <h2>AWS Support Documentation</h2>
            {!! $page->aws_support_documentation !!}
        </div>
    </div>

   {{--  <section class="swatch2 clearfix paddedTopBottom-2x">
        <div class="container">
            <div id="text-8" class="widget widget_text"><h4 class="widget-title">Video Presentations</h4>			
                <div class="textwidget">
                    <ul class="sales-presentations">
                        <div class="col-xs-9 fdl" style="text-align:left; padding: 0;">
                            {!! $page->video_presentations !!}
                        </div>
                        @foreach( $videos as $key=>$video)
                        <li class="item{{$key+1}}">
                            <div class="infoblock">
                                <a href="{!! $video->slug !!}">
                                    <img src="/{!! $video->image !!}">
                                    <h3>{!! $video->title !!}</h3>
                                </a>
                                {!! $video->content !!}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
</div>

@stop
