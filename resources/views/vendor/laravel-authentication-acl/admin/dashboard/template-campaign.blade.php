@extends('admin.layouts.base-1cols')

@section('title')
Admin area: dashboard
@stop

@section('head_css')
<style>
    #category .tab-content tabpanellist{
        width: 70%; 
    }

    #category .tab-content ul {
        list-style-type: disc !important;
    }

    #category .tab-content ul li {
        width: 40%; 
        display:inline-block;
    }

    #category .nav-tabs > li.active {
        background: #a2a2a2  none repeat scroll 0 0;
    }
    #category .nav-tabs > li:hover {
        background: #a2a2a2  none repeat scroll 0 0;
    }
    
    #category .nav-tabs > li.active a p{color:#fff;}

    #category .tab-content ul li:before {
        content: "\f111"; /* FontAwesome Unicode */
        font-family: FontAwesome;
        display: inline-block;
        font-size: 10px;
        text-align: middle;
        margin-left: -2em; /* same as padding-left set on li */
        width: 2em; /* same as padding-left set on li */
    }    

    @media only screen and (max-width: 550px) {
        #category .tab-content ul li {
            width: 100%; 
            display:inline-block !important
        }
    }    

</style>
@stop



@section('content')
<div class="">

    <div id="category">
        <h1>Please click on a category below!</h1>
        <p>Select which category you would like to create from our professionally designed starter templates below. </p>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="tabid">

            @foreach($contents as $content)
            @if($content->downloadable_content != "")
            <li role="presentation"><a href="#category_list" data-temp-id="{!! $content->id !!}" data-tag-id="{!! $content->tag_id !!}" class="loadCampaign" aria-controls="category_list" role="tab" data-toggle="tab" style='background: url("<?php echo URL::to('/') . "/" . $content->thumbnail; ?>") no-repeat;background-position:center top;'><p>{!! $content->tag_name !!}</p></a></li>
<!--            <div class="tmplates-link"><a href="{!! URL::route('contents.download', ['id' => $content->id]) !!}" target="_blank"><p>{!! $content->content_title !!}</p></a></div>-->
            @else
            <li role="presentation"><a href="#category_list" data-temp-id="{!! $content->id !!}" data-tag-id="{!! $content->tag_id !!}" class="loadCampaign" aria-controls="category_list" role="tab" data-toggle="tab" style='background: url("<?php echo URL::to('/') . "/" . $content->thumbnail; ?>") no-repeat;background-position:center top;'><p>{!! $content->tag_name !!}</p></a></li>
            @endif
            @endforeach
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="category_list">
                <!--campaign list goes there-->
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</div>
@stop

@section('footer_scripts')
<script>
    $(document).ready(function () {
//        $("#tabid li").hover(
//                function () {
//                    $(this).css("background", "#a2a2a2 none repeat scroll 0 0");
//                }, function () {
//                    $(this).css("background", "#ebebeb none repeat scroll 0 0");
//                }
//        );
        $(".loadCampaign").click(function (e) {
            //   var tag_id = ($(this).data("tag-id"))
            $default_temp = $(this).data("temp-id");
            var letusdo = <?php echo $letusdo; ?>;
            $.ajax({
                dataType: "json",
                url: '/admin/users/dashboard/taginfo',
                data: {tag_id: $(this).data("tag-id")},
                success: function (result) {
                    if (result.status == 'ok') {
                        data = result.campaign;
                        dataDownloadable = result.downloadable_content;
                        var html = '<h2>Now click on the condition you would like to customize!</h2>';
                        html += '<div class="row" style="padding-left: 40px; padding-top:10px">';
                        html += ' <div class="tabpanellist">';
                        html += '<ul>';
                        if (!dataDownloadable) {
                            data.forEach(function (value, index) {
                                if (letusdo) {
                                    html += '<li><a href="/admin/templates/new?tag_id=' + value.tag_id + '&campaign_id=' + value.campaign_id + '&letusdo=1" target="_blank"><span>' + value.campaign_name + '</span></a>';
                                } else
                                    html += '<li><a href="/admin/templates/new?tag_id=' + value.tag_id + '&campaign_id=' + value.campaign_id + '" target="_blank"><span>' + value.campaign_name + '</span></a>';
                            })
                        } else {
                            data.forEach(function (value, index) {
                                html += '<li><a href="/admin/contents/download?id=' + value.id + '" target="_blank"><span>' + value.campaign_name + '</span></a>'
                            })
                        }
                        html += '</ul>';
                        html += '</div>';
                        html += '</div>';
                        $("#category_list").html(html);
                    } else {
                        $("#category_list").html('<h2> No record found. </h2>');
                    }

                    //var menu = "<?php echo $letusdo; ?>";
//                    if (menu && menu != "") {
//                        $('.tabpanellist ul li a').each(function () {
//                            var _href = jQuery(this).attr('href') + '&menu=' + menu;
//                            jQuery(this).attr("href", _href);
//                        });
//                    }
                    /*$('.tabpanellist ul li').each(function () {
                     console.log("This", jQuery(this).attr('href'));
                     });*/
                },
            });
        })
    })
</script>
@stop
