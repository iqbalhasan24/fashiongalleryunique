@extends('admin.layouts.base-1cols')

@section('title')
    {!! $page->title !!}
@stop

@section('content')

<div class="container" >    
    <!-- Indicators -->       
    @if($page->banner_type != 'slider')     
       
        <div class="row">
            <div class="col-md-12">
                <div style='background: rgba(0, 0, 0, 0) url("/{!! $page->banner_image!!}") repeat scroll right top / cover;height: 458px;'>             
                    {!! $page->banner_description !!}        
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
                {!! $page->content !!}
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="gray-bg small-grey  text-center">
                {!! $page->short_description !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <ul class="list-unstyled home-list">
                @foreach( $portfolio_rows as $key => $home )
                <li>
                    <a href="">
                        <div class="row">
                            <div class="col-md-3"><img src="/{!! $home->image !!}"/></div>
                            <div class="col-sm-9 ">
                                <h2>{!! $home->title !!}</h2>
                                {!! $home->content !!}
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>

</div>
@stop
