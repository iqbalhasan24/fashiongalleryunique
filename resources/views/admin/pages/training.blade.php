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
                <img src="{{asset('/'.$page->banner_image)}}"  width="100%"  style="margin:0px;">
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

    <!-- <div class="row">
        <div class="col-md-12 wc-details-con">
            <div class="col-md-4">
                <ul class="details-ul">
                    <li><a href="../../assets/MDLIVE-Activation-Flyer-ENG.pdf" target="_blank">Activation-PDF-ENG</a></li>
                    <li><a href="../../assets/MDLIVE-Activation-Flyer-SPA.pdf" target="_blank">Activation-PDF-SPA</a></li>
                </ul>
                <p class="itemdesc"><strong>What is it?</strong>&nbsp;One-page, four-color sheet overview sheet.</p>
                <p class="itemdesc"><strong>How to use it:</strong>&nbsp;Include in initial launch packet to all members/employees that are eligible to use MDLIVE virtual care. Provide to new employees in benefits package materials and welcome kits.</p> 
            </div> 
            <div class="col-md-4">                
                <ul class="details-ul">
                    <li><a href="../../assets/MDLIVE-Activation-Poster-ENG.pdf" target="_blank">Activation-PDF-ENG</a></li>
                    <li><a href="../../assets/MDLIVE-Activation-Poster-SPA.pdf" target="_blank">Activation-PDF-SPA</a></li>
                </ul>
                <p>&nbsp;</p>
                <p class="itemdesc"><strong>What is it?</strong> Large one-page, four-color overview poster.</p>
                <p class="itemdesc"><strong>How to use it:</strong> Print and place in areas where employees congregate to promote awareness of MDLIVE and virtual care. Ideal locations are elevators, lunch room, break room, near the water cooler, and hallways.</p> </div> <div class="col-md-4">
                <ul class="details-ul">
                    <li><a href="#" target="_blank">160×600-Generic-JPG-ENG</a></li>
                    <li><a href="#" target="_blank">720×90-Generic-JPG-ENG</a></li>
                    <li><a href="#" target="_blank">160×600-Generic-JPG-SPA</a></li>
                    <li><a href="#" target="_blank">720×90-Generic-JPG-SPA</a></li>
                </ul>
                <p>&nbsp;</p>
                <p class="itemdesc"><strong>What is it?</strong> Digital banners encouraging activation.</p>
                <p class="itemdesc"><strong>How to use it:</strong> Place banners on your Intranet site or in employee/member newsletters. Use banners in email blasts to your community of eligible members.</p>  </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 wc-details-con-02">
            <h2>AWS Support Documentation</h2>
            <p><strong>What is it?</strong>&nbsp;Complete campaigns focused on seasonal conditions to increase awareness and encourage utilization.</p>
            <p><strong>How to use it:</strong>&nbsp;We suggest running one campaign per month and timing each campaign to coincide with the typical occurrence of these common ailments. In version 2.0 of the MDLIVE Marketing Hub there will be plenty of additional campaigns to choose and leverage so you can run one or two per month.</p>
            <p><strong style="box-sizing: border-box; margin: 0px; outline: 0px;">How to build a campaign in 3 steps</strong></p>
            <p>After adding your logo, phone number and web address to these materials just follow these 3 easy steps:</p>
            <ul>
                <li>Step 1 – Send out the HTML email to your eligible users</li>
                <li>Step 2 – Post the campaign flyer in high trafficked areas as a reminder for employees to see a virtual doctor if they are experiencing symptoms</li>
                <li>Step 3 – Take the provided blog/article copy and banners and place them on your Intranet site, website or in a company/employee/employer/health plan/health system newsletter</li>
            </ul>
        </div>

    </div> -->

   
    {!! $page->content !!}   <!-- total page content -->

</div>
@stop
