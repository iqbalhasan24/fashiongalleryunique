@extends('admin.layouts.base-1cols')

@section('title')
BRAND ASSETS | MDLive Marketing
@stop

@section('content')
<section id="brand-assets-bn" class="banner masthead swatch1 paddedTopBottom-2x" style='background: rgba(0, 0, 0, 0) url("/{!! $page->banner_image!!}") repeat scroll right top / cover;height: 458px;'>
    <div class="container">
        <div class="col-md-6">
            <h1>{!! $page->banner_title !!}</h1>
            {!! $page->banner_description !!}
        </div>
    </div>
</section>
<section class="container paddedTopBottom-2x swatch1 brand-assets-container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="borderedBottom">Logos</h2>
            <div class="row">
                <div class="col-xs-9">
                    {!! $page->content !!}                    
                </div>
            </div>
            <div class="row paddedTopBottom">
                @foreach( $logos as $logo)
                <div class="col-sm-6 text-center">
                    <div class="logoContainer">
                        <div class="imgContainer">
                            <img width="300" border="0" alt="" src="/{!! $logo->image !!}">
                        </div>
                        {!! $logo->content !!}
                    </div>
                </div>
                @endforeach
                {{--                <div class="col-sm-6 text-center">
                    <div class="logoContainer">
                        <div class="imgContainer"><img width="300" border="0" alt="" src="images/MDLIVE-Logo_Tagline.png"></div>
                        <p>Select format to download</p>
                        <p><a target="_blank" href="http://www.mdlivemarketing.com/wp-content/uploads/2015/08/MDLIVE-Logo_Tagline.pdf" class="btn btn-primary">PDF</a> <a target="_blank" href="http://www.mdlivemarketing.com/wp-content/uploads/2015/08/MDLIVE-Logo_Tagline.eps_.zip" class="btn btn-primary">EPS</a> <a target="_blank" href="http://www.mdlivemarketing.com/wp-content/uploads/2015/08/MDLIVE-Logo_Tagline.jpg" class="btn btn-primary">JPG</a> <a target="_blank" href="http://www.mdlivemarketing.com/wp-content/uploads/2015/08/MDLIVE-Logo_Tagline.png" class="btn btn-primary">PNG</a></p></div>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="logoContainer">
                        <div class="imgContainer"><img width="300" border="0" alt="Breakthrough Behavioral Health" src="images/Breakthrough.png"></div>
                        <p>Select format to download</p>
                        <p>
                            <a class="btn btn-primary" target="_blank" rel="" href="http://www.mdlivemarketing.com/wp-content/uploads/2015/05/Breakthrough.pdf">PDF</a> 
                            <a class="btn btn-primary" target="_blank" rel="" href="http://www.mdlivemarketing.com/wp-content/uploads/2015/05/Breakthrough.eps_.zip">EPS</a>
                            <a target="_blank" href="http://www.mdlivemarketing.com/wp-content/uploads/2015/08/Breakthrough-An-MDLIVE-Company.jpg" class="btn btn-primary">JPG</a> 
                            <a class="btn btn-primary" target="_blank" rel="attachment wp-att-543" href="http://www.mdlivemarketing.com/wp-content/uploads/2015/05/Breakthrough.png">PNG</a>
                        </p>
                    </div>
                </div>--}}
            </div>
            <h2 class="borderedBottom" id="promoHdr">Promotional Items</h2>
            <div style="margin-bottom:10px;" class="row">
                <div class="col-xs-9">
                    {!! $page->promotional_items !!}                    
                </div>
            </div>
            <div class="col-xs-12">
                @foreach( $items as $item)
                <div id="{!! $item->slug !!}" class="detailViewWrapper hidden">
                    <div class="row swatch2">
                        <div class="borderedBottom clearfix">
                            <div class="col-xs-11" id="hdr">
                                <h2>{!! $item->title !!}</h2>
                            </div>
                            <div class="col-xs-1 text-right"><span id="closeBtn" class="closeBtn" data-target="{!! $item->slug !!}">×</span></div>
                        </div>
                        <div class="text-center" id="content"><img src="/{!! $item->image !!}" id="mainImg"></div>
                    </div>
                </div>
                @endforeach
<!--                <div id="3-in-1" class="detailViewWrapper hidden">
                    <div class="row swatch2">
                        <div class="borderedBottom clearfix">
                            <div class="col-xs-11" id="hdr">
                                <h2>MDLIVE 3-in-1</h2>
                            </div>
                            <div class="col-xs-1 text-right"><span id="closeBtn" class="closeBtn" data-target="3-in-1">×</span></div>
                        </div>
                        <div class="text-center" id="content"><img src="images/3-in-1.png" id="mainImg"></div>
                    </div>
                </div>

                <div id="pen" class="detailViewWrapper hidden">
                    <div class="row swatch2">
                        <div class="borderedBottom clearfix">
                            <div class="col-xs-11" id="hdr">
                                <h2>MDLIVE Stylus Pen</h2>
                            </div>
                            <div class="col-xs-1 text-right"><span id="closeBtn" class="closeBtn" data-target="pen">×</span></div>
                        </div>
                        <div class="text-center" id="content"><img src="images/MDLIVE_PEN.jpg" id="mainImg"></div>
                    </div>
                </div>
                <div id="charger" class="detailViewWrapper hidden">
                    <div class="row swatch2">
                        <div class="borderedBottom clearfix">
                            <div class="col-xs-11" id="hdr">
                                <h2>MDLIVE Car Charger</h2>
                            </div>
                            <div class="col-xs-1 text-right"><span id="closeBtn" class="closeBtn" data-target="charger">×</span></div>
                        </div>
                        <div class="text-center" id="content"><img src="images/charger.png" id="mainImg"></div>
                    </div>
                </div>
                <div id="dispenser" class="detailViewWrapper hidden">
                    <div class="row swatch2">
                        <div class="borderedBottom clearfix">
                            <div class="col-xs-11" id="hdr">
                                <h2>MDLIVE Bandage Dispenser</h2>
                            </div>
                            <div class="col-xs-1 text-right"><span id="closeBtn" class="closeBtn" data-target="dispenser">×</span></div>
                        </div>
                        <div class="text-center" id="content"><img src="images/bandage.png" id="mainImg"></div>
                    </div>
                </div>
                <div id="swatch" class="detailViewWrapper hidden">
                    <div class="row swatch2">
                        <div class="borderedBottom clearfix">
                            <div class="col-xs-11" id="hdr">
                                <h2>MDLIVE Magnet</h2>
                            </div>
                            <div class="col-xs-1 text-right"><span id="closeBtn" class="closeBtn" data-target="swatch">×</span></div>
                        </div>
                        <div class="text-center" id="content"><img src="images/MDLIVE-generic-magnet-MD-01.jpg" id="mainImg"></div>
                    </div>
                </div>-->
                <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2 clearfix" id="promoItems">
                    @foreach( $items as $item)
                    <li style="margin-bottom:30px;" class="block-grid-item">
                        {!! $item->content !!}         
                        <p><a href="#{!! $item->slug !!}" class="btn btn-primary page-scroll">View</a></p>
                    </li>
                    @endforeach
<!--                    <li style="margin-bottom:30px;" class="block-grid-item">
                        <img style="padding-bottom:10px;" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/05/3-in-1-th.png"><br>
                        <span class="lead">MDLIVE 3-in-1</span><p></p>
                        <p class="itemdesc">All-in-one mousepad, keyboard protector, and microfiber cloth.</p>
                        <p><a href="#3-in-1" class="btn btn-primary page-scroll">View</a></p>
                    </li>
                    <li style="margin-bottom:30px;" class="block-grid-item">
                        <img style="padding-bottom:10px;" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/05/MDLIVE_PEN_TH.jpg"><br>
                        <span class="lead">MDLIVE Stylus Pen</span><p></p>
                        <p class="itemdesc">Click to write offline. Click again to tap online.</p>
                        <p><a class="btn btn-primary page-scroll" href="#pen">View</a></p>
                    </li>
                    <li style="margin-bottom:30px;" class="block-grid-item">
                        <img style="padding-bottom:10px;" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/05/car-charger-th.png"><br>
                        <span class="lead">MDLIVE Car Charger</span><p></p>
                        <p class="itemdesc">Keeps your electronic gadgets powered while on the go.</p>
                        <p><a class="btn btn-primary page-scroll" href="#charger">View</a></p>
                    </li>
                    <li style="margin-bottom:30px;" class="block-grid-item">
                        <img style="padding-bottom:20px;" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/05/bandage-th.png"><br>
                        <span class="lead">MDLIVE Bandage Dispenser</span><p></p>
                        <p class="itemdesc">All-in-one mousepad, keyboard protector, and microfiber cloth.</p>
                        <p><a class="btn btn-primary page-scroll" href="#dispenser">View</a></p>
                    </li>
                    <li style="margin-bottom:30px;" class="block-grid-item">
                        <img style="padding-bottom:10px;" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/05/MDLIVE-generic-magnet-MD-th.png"><br>
                        <span class="lead">MDLIVE Magnet</span><p></p>
                        <p class="itemdesc">2×3.5-inch magnet sticks to any steel surface and brands 24/7.</p>
                        <p><a class="btn btn-primary page-scroll" href="#swatch">View</a></p>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</section>
@stop
