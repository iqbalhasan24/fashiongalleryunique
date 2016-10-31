@extends('admin.layouts.base-1cols')

@section('title')
Welcome | MDLive Marketing
@stop

@section('content')
<!---slider----->
<div id="mdlive-slider" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach( $sliders as $key => $slide)
        <li data-target="#mdlive-slider" data-slide-to="{{ $key }}" @if($key == 0)class="active" @endif></li>        
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach( $sliders as $key => $slide )
            <div class="item @if($key == 0) active @endif">
                <div class="slides"  style='height:380px;background: rgba(0, 0, 0, 0) url("/{{ $slide->image }}") no-repeat scroll 0 0 / cover ;'>
                    <h1>{!! $slide->title !!}</h1>
                    <p>{!! $slide->content !!}</p>
                </div>
            </div>
        @endforeach
<!--        <div class="item active">
            <div class="slide-1 slides">
                <h1>MDLIVE  <br/>Marketing Hub</h1>
            </div>

        </div>
        <div class="item">
            <div class="slide-2 slides">
                <h1>Browse Now.<br/> Browse Often.</h1>
                <p>Fresh, new content – new campaigns added every 10 days!  Get the latest news and tips that you can share with your members/employees.</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-3 slides">
                <h1>Coming Soon!<br/> Marketing Hub 2.0 </h1>
                <p>We’re putting the finishing touches on “phase 2” of our Marketing Hub. Soon you’ll also be able to personalize our templates with YOUR content, colors, fonts, branding, and much more!   		</p>
            </div>
        </div>-->
    </div>

    <!-- Controls -->

</div>
<!---end--->
<!---dark ash section--->
<section class="drak-grey ">
    <div class="container-fluid paddedTop">
        {!! $page->content !!}        
    </div>
</section>
<section class="gray-bg small-grey">
    <div class="container-fluid text-center ">
        {!! $page->short_description !!}
    </div>
</section>
<section id="essentials">
    @foreach( $home_rows as $key => $home )
    <a class="paddedTopBottom" href="{!! $home->slug !!}">
        <div class="row">
            <div class="col-sm-3"><img class="alignnone size-full wp-image-773 mdliveShape" alt="thumb-checklist" src="/{!! $home->image !!}"></div>
            <div class="col-sm-9 ">
                <h2>{!! $home->title !!}</h2>
                {!! $home->content !!}
                
            </div>
        </div>
    </a>
    @endforeach
<!--    <a class="paddedTopBottom" href="{!! URL::route('welcome.promoteutilization') !!}">
        <div class="row">
            <div class="col-sm-3"><img width="234" height="139" class="alignnone size-full  mdliveShape" alt="thumb-checklist" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/04/thumb-engagement.jpg"></div>
            <div class="col-sm-9"><h2>Promote Utilization</h2><p>Get the most from virtual care and MDLIVE by encouraging usage.  Here’s where you’ll find new content and campaigns (posted every 10 days or less), with timely health concerns and/or seasonal campaigns to help boost utilization and ongoing healthcare awareness. 
                </p></div>
        </div>
    </a>
    <a class="paddedTopBottom" href="{!! URL::route('welcome.brand-asset') !!}">
        <div class="row">
            <div class="col-sm-3"><img width="234" height="139" class="alignnone size-full wp-image-773 mdliveShape" alt="thumb-checklist" src="http://www.mdlivemarketing.com/wp-content/uploads/2016/04/thumb-branding.jpg"></div>
            <div class="col-sm-9"><h2>Brand Marketing</h2><p>Want to incorporate MDLIVE into your materials? Look here for our logo, branding and content guidelines, and easy-to-use templates.</p></div>
        </div>
    </a>-->
</section>
<!---end---->
<div class="row">
    <div class="col-md-12">
        <div class="admin-area">
            <div class="row">
                <div class="col-sm-9">
<!--                    <div class="qstn-area">
                        <p>What is telehealth?</p>
                        <p>How a consultation works for a patient?</p>
                        <p>How a consultation works for a physician?</p>
                        <p>Commonly treated conditions both medical and behavioral.</p>
                        <p>Who are the doctors?</p>
                        <p>How is Payment determined</p>
                    </div> -->
                </div>
                <!--
                @if( count($user_data->user_profile()->first()) > 0 && (strtolower($user_data->groups()->first()->name)=="health system" || strtolower($user_data->groups()->first()->name)=="health plan" || strtolower($user_data->groups()->first()->name)=="employer"))
                    <div class="col-sm-3">
                        <div class="hover">
                            <?php
                            $name = "";
                            $url = "";
                            $logo = "";
                            $copay = "";
                            $company_name = json_decode($user_data->user_profile()->first()->company_name, true);
                            if ($company_name != null) {
                                $name = array_values($company_name)[0];
                                if ($company_name["Default"] != "")
                                    $name = $company_name["Default"];
                            }

                            $company_url = json_decode($user_data->user_profile()->first()->urls, true);
                            if ($company_url != null) {
                                $url = array_values($company_url)[0];
                                if (isset($company_url["Default"]) && $company_url["Default"] != "")
                                    $url = $company_url["Default"];
                            }

                            $company_logo = json_decode($user_data->user_profile()->first()->logos, true);
                            if ($company_logo != null) {
                                $logo = array_values($company_logo)[0];
                                if (isset($company_logo['Default']) && $company_logo['Default'] != "")
                                    $logo = $company_logo['Default'];
                            }

                            $copay_statement = json_decode($user_data->user_profile()->first()->copay_statement, true);
                            if ($copay_statement != null) {
                                $copay = array_values($copay_statement)[0];
                                if (isset($copay_statement['Default']) && $copay_statement['Default'] != "")
                                    $copay = $copay_statement['Default'];
                            }
                            ?>
                            @if( $logo !="")
                            <div class="company-logo"><img src="/logos/{!! $logo !!}" width="100%" /></div>
                            @else                        
                            <div class="company-logo">{{ HTML::image('images/company-l.jpg') }}</div>
                            @endif
                            <div class="overlay">
                                <p>{{ $name }}</p>
                                <p><a href="{{ $url }}" target="_blank">{{ $url }}</a></p>
                                <p>{{ $copay }}</p>
                                <a class="edit-button" href="{{ URL::route('users.companyProfile') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </div>                        
                        </div>
                    </div>
                @endif
                -->
            </div>
        </div>
    </div>
</div>
@stop
