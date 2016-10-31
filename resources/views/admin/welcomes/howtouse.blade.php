@extends('admin.layouts.base-1cols')

@section('title')
    How to Use the Hub | MDLive Marketing
@stop

@section('content')
<div id="how-to-use-bn" class="banner" style='background: rgba(0, 0, 0, 0) url("/{!! $page->banner_image!!}") repeat scroll right top / cover;height: 458px;'>
    <div class="container-fluid">
        <h1>{!! $page->banner_title !!}</h1>
        {!! $page->banner_description !!}
    </div>
</div>
<div class="contents">
    <div class="container-fluid">
        <h2>Easy as 1-2-3</h2>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="details">
                    <h2 class="borderBottom">1. Download</h2>                    
                    {!! $page->download !!}
<!--                    <ul>
                        <li><a href="{!! URL::route('welcome.encourageactivation') !!}">Encourage Activation</a></li>
                        <li><a href="{!! URL::route('welcome.promoteutilization') !!}">Promote Utilization</a></li>
                        <li><a href="{!! URL::route('welcome.brand-asset') !!}">Brand Marketing</a></li>
                    </ul>-->
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="details">
                    <h2 class="borderBottom" id="dir_hdr2">2. Customize</h2>
                    <p class="lead">{!! $page->customize !!}</p>
                    <div>
                        <ul id="samplesList2">
                            <li>
                                <a href="#sample-consumer-view" class="page-scroll">Sample Consumer Overview</a>
                                <div class="imageDetail" style="display: none;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3>Before</h3>
                                            <img width="1312" height="1687" class="alignnone size-full wp-image-975" alt="MDLIVE-CO-MD_concept4" src="/{!! $page->customize_content1_image !!}"></div><div class="col-sm-6"><h3>After</h3><img width="1312" height="1687" class="alignnone size-full wp-image-976" alt="MDLIVE-CO-MD-XYZ_concept4" src="/{!! $page->customize_content1_image_after !!}">
                                            </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#sample-web-integration" class="page-scroll">Sample Web Integration</a><div class="imageDetail" style="display: none;"><p>Add applicable monthly banner into the body of your website page or at the bottom</p><img src="/{!! $page->customize_content2_image !!}"></div></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!---Sample Consumer Overview--->
        <div id="sample-consumer-view" class=" gray-bg Overview hidden">
            <span id="closeBtn" class="closeBtn">×</span>
            <h2>Customize Sample Consumer Overview</h2>
            <div class="imageDetail" >
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Before</h3>
                        <img  class="alignnone img-responsive" alt="MDLIVE-CO-MD_concept4" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/05/MDLIVE-CO-MD_concept4.jpg">
                    </div>
                    <div class="col-sm-6">
                        <h3>After</h3>
                        <img class="alignnone  img-responsive" alt="MDLIVE-CO-MD-XYZ_concept4" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/05/MDLIVE-CO-MD-XYZ_concept4.jpg">
                    </div>
                </div>
            </div>
        </div>
        <!---end sample customer overview--->
        <!--sample web intrigation-------->
        <div class=" gray-bg Overview hidden" id="sample-web-integration" >
            <span id="closeBtn" class="closeBtn">×</span>
            <h2>Customize Sample Web Integration</h2>
            <div id="detailContainer">
                <div class="imageDetail" style="">
                    <p>Add applicable monthly banner into the body of your website page or at the bottom</p>
                    <img src="/{!! $page->customize_content2_image !!}">
                </div>
            </div>
            <div class="padded text-center"><a class="btn btn-primary" href="#" id="closeBtn2">CLOSE</a></div>
        </div>
        <!----end sample web intrigation---->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="details">
                    <h2 class="borderBottom">3. Distribute</h2>
                    <p class="lead">{!! $page->distribute_title !!}</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">

            </div>
        </div> 
        <div class="gray-bg fr-reminder">
            {!! $page->distribute !!}
<!--            <div class="row">
                <div class="col-md-6">
                    <h2>A Friendly Reminder</h2>
                    <p class="lead">Before you submit these documents to your fulfillment partner or distribute to your members, please be sure the following conditions have been met:</p>
                </div>
                <div class="col-md-6">
                    <ul class="marginTop">
                        <li>I have proofed this piece to confirm the phone number and URL are accurate and correct.</li>
                        <li>I understand by entering the information into the editable PDF and submitting this form that I have responsibility for any or all content in the documents for which I’m requesting printing.</li>
                        <li>I have not changed any content outside of the editable fields.</li>
                    </ul>
                </div>
            </div>-->
        </div>
    </div>
</div>
@stop
