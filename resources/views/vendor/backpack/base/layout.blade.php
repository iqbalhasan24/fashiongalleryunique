<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>
            {{ isset($title) ? $title.' :: '.config('backpack.base.project_name').' Admin' : config('backpack.base.project_name').' Admin' }}            
        </title>

        @yield('before_styles')

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/bootstrap.min.css') !!}
        {!! HTML::style('css/fonts.css') !!}
        {!! HTML::style('css/global.css') !!}
        {!! HTML::style('css/modify.css') !!}
        {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/style.css') !!}
        {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/baselayout.css') !!}
        {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/fonts.css') !!}
        {!! HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') !!}
        <!-- Bootstrap 3.3.5 -->
        <!-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bootstrap/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/skins/_all-skins.min.css">

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/morris/morris.css">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/datepicker/datepicker3.css">
    <!--     <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/daterangepicker/daterangepicker-bs3.css"> -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/pace/pace.min.css">
        <link rel="stylesheet" href="{{ asset('vendor/backpack/pnotify/pnotify.custom.min.css') }}">

        <!-- BackPack Base CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/backpack/backpack.base.css') }}">

        @yield('after_styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition {{ config('backpack.base.skin') }} sidebar-mini">
        {{-- navbar --}}
        @include('laravel-authentication-acl::admin.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidebar">
                        <ul class="nav nav-sidebar">
                            <li class="@if (Request::segment(2) == "page" && Request::segment(3) == "") active @endif"><a href="{{ url('admin/page') }}"><i class="fa fa-newspaper-o"></i> <span>Pages</span></a></li>                            
                            <li class="@if (Request::segment(2) == "article") active @endif"><a href="{{ url('admin/article') }}"><i class="fa fa-newspaper-o"></i> <span>Posts</span></a></li>
                            <li class="@if (Request::segment(2) == "category") active @endif"><a href="{{ url('admin/category') }}"><i class="fa fa-list"></i> <span>Categories</span></a></li>                            
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 main">
                    @yield('content')


                    </div>
            </div>
        </div>

        @yield('before_scripts')

        <!-- jQuery 2.2.0 -->
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

        <script>window.jQuery || document.write('<script src="{{ asset('vendor / adminlte') }}/plugins/jQuery/jQuery-2.2.0.min.js"><\/script>')</script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{ asset('vendor/adminlte') }}/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('vendor/adminlte') }}/plugins/pace/pace.min.js"></script>
        <script src="{{ asset('vendor/adminlte') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="{{ asset('vendor/adminlte') }}/plugins/fastclick/fastclick.js"></script>
        <script src="{{ asset('vendor/adminlte') }}/dist/js/app.min.js"></script>

       
        <!-- page script -->
        <script type="text/javascript">
// To make Pace works on Ajax calls
$(document).ajaxStart(function () {
    Pace.restart();
});

// Ajax calls should always have the CSRF token attached to them, otherwise they won't work
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Set active state on menu element
//        var current_url = "{{ url(Route::current()->getUri()) }}";
//        $("ul.sidebar-menu li a").each(function() {
//          if ($(this).attr('href').startsWith(current_url) || current_url.startsWith($(this).attr('href')))
//          {
//            $(this).parents('li').addClass('active');
//          }
//        });

function sizeLeftMenuFiller() {
    var tmpOffset = jQuery("#navigation-container").offset();
    var newW = tmpOffset.left;
    jQuery("#navWrapLeftFiller").width(newW);
}
jQuery(document).ready(function () {
    jQuery(".gradTop").append('<div id="navWrapLeftFiller"></div>');
    sizeLeftMenuFiller();
    jQuery('#navWrap .sub-menu').hide();
    jQuery("#navWrap li:has(ul)").hover(function () {
        jQuery(" ul", this).toggle('slow');
    });

    /***************Menu JS*******************/
    $("#addtlLinks").click(function () {
        $(this).find('.user-menu').slideToggle('500');
        $("#addtlLinks > a").toggleClass("down");
    });
});
jQuery(window).resize(function (e) {
    if (window.outerWidth > 850) {
        sizeLeftMenuFiller();
    }
});
        </script>

        @include('backpack::inc.alerts')

        @yield('after_scripts') 


        <script>
            $(document).ready(function() {
                $('#banner_type').change(function() {
                   
                    var banner_type = $(this).val();
                    if(banner_type=='slider') {

                        $("#banner_title").parent().hide();
                        $("#banner_description").parent().hide();
                        $("#banner_image-filemanager").parent().hide();

                        //$('#banner_type').html('<h5>Please add category and post</h5>')

                    } else {

                        $("#banner_title").parent().show();
                        $("#banner_description").parent().show();
                        $("#banner_image-filemanager").parent().show();

                    }                
                });  
            });

            $(document).ready(function() {                
                   
                var banner_type = $('#banner_type').val();
                if(banner_type=='slider') {

                    $("#banner_title").parent().hide();
                    $("#banner_description").parent().hide();
                    $("#banner_image-filemanager").parent().hide();

                    //$('#banner_type').html('<h5>Please add category and post</h5>')

                } else {

                    $("#banner_title").parent().show();
                    $("#banner_description").parent().show();
                    $("#banner_image-filemanager").parent().show();
                }    
            });
        </script>   


        <!-- JavaScripts -->
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
