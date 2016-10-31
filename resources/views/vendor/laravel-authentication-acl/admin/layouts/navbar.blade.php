<?php
$current_route = \Request::route()->getName();

$authentication = \App::make('authenticator');
$user = $authentication->getLoggedUser();
//$user_group = strtolower($user->groups()->first()->name);
?>
<style>
    #addtlLinks .user-menu a:nth-child(1){display: none !important;}
    .user-menu{display:none;padding: 0 !important;padding:0 !important;list-style:none;position: absolute;  border: 1px solid #ccc;background:#fff;z-index:999;margin:0;}
    #addtlLinks .user-menu a{padding:12px 6px;border-bottom: 1px solid #ccc;display:block; line-height: normal;text-align: center;}
    #addtlLinks .user-menu a:last-child{border-bottom:none;}
    #addtlLinks .fa{margin-left:5px;}
    #addtlLinks > a {cursor: pointer;}
    .up {background:url(/images/arrowDown.png) no-repeat right 10px;}
    .down {background:url(/images/arrowup.png) no-repeat right 10px;}
    #navWrap .sub-menu li:last-child a {
        border-bottom-right-radius: 25px;
    }     

</style>


<header>
    <div class="container">  
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 logo">
                    <a href="/">
                        {{ HTML::image('images/site-logo.png') }}
                    </a>
                </div>
               <!--  <div class="col-md-4 text-center logo1">
                    {{ HTML::image('images/ama-logo.png') }}
                </div> -->
                <div class="col-md-6 text-right logo2">
                    {{ HTML::image('images/logo-o1.png') }}
                </div>

            </div>
        </div>

    </div>
</header> 

<nav class="navbar navbar-default">
    <div class="container" id="navigation-container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>      
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if (isset($current_route) && $current_route == "home"): ?>class="active"<?php endif; ?>><a href="{!! URL::route('home') !!}">Home <br> &nbsp; </a><li>  
                <li <?php if (isset($current_route) && $current_route == "partnership"): ?>class="active" <?php endif; ?>><a href="{!! URL::route('partnership') !!}">Partnership <br> &nbsp;</a></a><li>       
                <li <?php if (isset($current_route) && $current_route == "portfolio"): ?>class="active" <?php endif; ?>><a href="{!! URL::route('portfolio') !!}">Westcon-Comstor <br> AWS Cloud Portfolio</a><li>       
                <li <?php if (isset($current_route) && $current_route == "training"): ?>class="active" <?php endif; ?>><a href="{!! URL::route('training') !!}">Training <br> Enablement</a><li>       
                <li <?php if (isset($current_route) && $current_route == "engaging"): ?>class="active" <?php endif; ?>><a href="{!! URL::route('engaging') !!}">Engaging End <br> Customers</a><li>       
                <li <?php if (isset($current_route) && $current_route == "support"): ?>class="active" <?php endif; ?>><a href="{!! URL::route('support') !!}">Activition, On-boarding <br> and Support</a><li>       
                <li class="pull-right">
                    @if($user)
                    <div id="addtlLinks">
                        <a class="up" style="color:#fff" ><br> Welcome &nbsp;</a>
                        <!--a>Welcome <i class="fa fa-caret-up" aria-hidden="true"></i></a-->
                        <div class="user-menu"> 
                            @if(isset($menu_items))
                            @foreach($menu_items as $item)
                            <a class="{!! LaravelAcl\Library\Views\Helper::get_active_route_name($item->getRoute()) !!}" href="{!! $item->getLink() !!}">{!!$item->getName()!!}</a>
                            @endforeach
                            @endif 
                            <a href="{!! URL::route('users.list') !!}">User List</a> 
                            <a href="{!! URL::route('users.selfprofile.edit') !!}">My Account</a>
                            <a href="{!! URL::route('contact.form') !!}">Contact Us</a>
                            <a href="{!! URL::route('user.logout') !!}">Sign Out</a>
                        </div>
                    </div>
                    @else 
                    <a style="padding-top: 17px; padding-bottom: 0px" href="{!! URL::route('user.login') !!}">Login<br> &nbsp; </a>      
                    @endif
                </li>

            </ul>  

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>