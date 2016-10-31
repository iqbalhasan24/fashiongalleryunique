@extends('admin.layouts.base-1cols')

@section('title')
Promote Utilization | MDLive Marketing
@stop

@section('content')

<?php $user_group = strtolower($user->groups()->first()->name); ?>
<div id="promote-utilization-bn" class="banner" style='background: rgba(0, 0, 0, 0) url("/{!! $page->banner_image!!}") repeat scroll right top / cover;height: 458px;'>
    <div class="container-fluid">
        <h1>{!! $page->banner_title !!}</h1>
        {!! $page->banner_description !!}
    </div>
</div>
<div class="promote-utilization-section-2">
    {!! $page->content !!}    
</div>
<div class="builder-marcom">
    <h4 id="pageTitle" class="borderedBottom">MARCOM Builder</h4>
    {!! $page->marcom_builder !!}
<!--    <p class="sub-title">What is it?</p>
    <p>An easy-to-use online tool that enables users to build and customize their own materials promoting the use of MDLIVE throughout their organization.</p>
   <p class="sub-title">How to us it:</p>
   <p>Pick a type of material you’d like to create, drag-and-drop pre-written content into your selected template, customize your pieces with your company logo, colors, etc., and then save your “finals” to your PC for distribution. </p>-->
    <a href="{!! URL::route('dashboard.default') !!}" class="btn btn-started">get started</a>
</div>

<section class="swatch1 container paddedTopBottom-2x">
    <h2 class="borderedBottom">MDLIVE Engagement Material</h2>
    <div class="col-xs-12 fdl">
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
            @foreach( $materials as $data)
            <li class="block-grid-item"><p class="lead"><strong>{!! $data->title !!}</strong></p>
                {!! $data->content !!}                
            </li>
            @endforeach            
        </ul>
    </div>
    <!-- END ROW 1 -->
    <h2 class="borderedBottom">Ready to Go Campaigns</h2>
    {!! $page->ready_to_go_campaigns !!}
    <div class="col-xs-12 fdl">
        @if ($user_group == "admin" || $user_group == "superadmin") 
        {!! $page->admin_content !!}
        {{--      @include('admin.welcomes.template-global')--}}
        @elseif($user_group == "health system")
        {!! $page->health_system_content !!}
        {{--            @include('admin.welcomes.template-health-system')--}}
        @elseif($user_group == "health plan")
        {!! $page->health_plan_content !!}
        {{--            @include('admin.welcomes.template-health-plan')--}}
        @else
        {!! $page->employer_content !!}
        {{--            @include('admin.welcomes.template-employer')--}}
        @endif
    </div>
    <!-- END ROW 2 -->
</section>
<section class="swatch2 clearfix paddedTopBottom-2x">
    <div class="container">
        <div id="text-8" class="widget widget_text"><h4 class="widget-title">Video Presentations</h4>			
            <div class="textwidget">
                <ul class="sales-presentations">
                    <div class="col-xs-9 fdl" style="text-align:left; padding: 0;">
                        {!! $page->video_presentations !!}
<!--                        <p class="itemdesc"><strong>What is it?</strong>  Short overview videos available for download</p>
                        <p class="itemdesc"><strong>How to use it:</strong>  Place on intranet site or host videos and provide links to them in emails and promotions to employees/members. Videos are ideal for providing a quick, easy-to-understand overview, especially for new employees or those new to virtual care.</p><br>-->
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
                    <!--                    <li class="item1">
                                            <div class="infoblock"><a href="https://www.youtube.com/watch?v=0OfRhMDJd24" target="_blank"><img src="http://www.mdlivemarketing.com/wp-content/uploads/2016/04/vca-vid.png">
                                                    <h3>VIRTUAL CARE, ANYWHERE.</h3></a>
                                                <p>Video presentation.</p>
                                            </div>
                                        </li>
                                        <li class="item2">
                                            <div class="infoblock"><a href="https://www.youtube.com/watch?v=mDxgfFAca98&amp;feature=youtu.be" target="_blank"><img src="http://www.mdlivemarketing.com/wp-content/uploads/2015/05/how-it-works.png">
                                                    <h3>HOW IT WORKS</h3></a>
                                                <p>Video presentation.</p>
                                            </div>
                                        </li>
                                        <li class="item3">
                                            <div class="infoblock"><a href="https://www.youtube.com/watch?v=hlTo_V35u8w&amp;feature=youtu.be" target="_blank"><img src="http://www.mdlivemarketing.com/wp-content/uploads/2015/05/welcome-to-mdlive.png">
                                                    <h3>WELCOME TO MDLIVE</h3></a>
                                                <p>Video presentation.</p>
                                            </div>
                                        </li>-->
                </ul>
            </div>
        </div>
    </div>
</section>
@stop
