@section('head_css')
<link rel="stylesheet" href="<?php echo asset('vendor/dropzoner/dropzone/dropzone.min.css'); ?>">
<style>
    .dropzone .dz-preview .dz-details .dz-filename:hover span{padding: 6px;}
    .dropzone .dz-preview .dz-details .dz-filename{padding: 8px;}
    #search_user_photo {padding-left: 15px}

    .clearable{
        background: #fff url(data:image/gif;base64,R0lGODlhBwAHAIAAAP///5KSkiH5BAAAAAAALAAAAAAHAAcAAAIMTICmsGrIXnLxuDMLADs=) no-repeat left -10px center;
        border: 1px solid #999;
        padding: 3px 18px 3px 4px; /* Use the same right padding (18) in jQ! */
        border-radius: 3px;
        transition: background 0.4s;
    }
    .clearable.x  { background-position: left 5px center; }
    .clearable.onX{ cursor: pointer;}
    .clearable::-ms-clear {display: none; width:0; height:0;}

</style>
@stop

@extends('admin.layouts.base-1cols')

@section('title')
Admin area: Edit user profile
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info margin-top-10">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title bariol-bold"><i class="fa fa-user"></i> Please drag and drop your printable documents (PDF, Docs, Powerpoint, Abode Illustrator, Microsoft Publisher) within the below box.</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div>
                            <form id="live-search" action="" class="styled" method="post">
                                <fieldset>
                                    <input class="form-control clearable" type="text" name="search_user_photo" id="search_user_photo" placeholder="Search here."/>
                                    <span id="filter-count"></span>
                                </fieldset>
                            </form>
                            <!--div><input class="form-control" type="text" name="search_user_photo" id="search_user_photo" placeholder="Search here."/></div-->
                            <form action='<?php echo route("dropzoner.upload") ?>' class='dropzone' id="dropzonersDropzone">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <div class="dz-message"></div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                                <div class="dropzone-previews" id="dropzonePreview"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

<!-- CSRF Token -->
<script>
    window.csrfToken = '<?php echo csrf_token(); ?>';
    window.dropzonerDeletePath = '<?php echo route('dropzoner.delete') ?>';</script>

@section('footer_scripts')
<script src="<?php echo asset('vendor/dropzoner/dropzone/dropzone.min.js'); ?>"></script>
<script src="<?php echo asset('vendor/dropzoner/dropzone/config.js'); ?>"></script>
<script>

    $(document).ready(function () {
        $("#search_user_photo").keyup(function () {
            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(), count = 0;
            // Loop through the comment list
            $(".dz-preview").each(function () {
                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).fadeOut();
                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    $(this).show();
                    count++;
                }
            });

            // Update the count
            var numberItems = count;
            // $("#filter-count").text("Total = " + count);
        });

        jQuery(function ($) {
            // CLEARABLE INPUT
            function tog(v) {
                return v ? 'addClass' : 'removeClass';
            }
            $(document).on('input', '.clearable', function () {
                $(this)[tog(this.value)]('x');
            }).on('mousemove', '.x', function (e) {
                //  $(this).toggleClass('onX', this.offsetWidth-18 < event.clientX-this.getBoundingClientRect().left);
                //$(this)[tog(this.offsetWidth - 18 < e.clientX - this.getBoundingClientRect().left)]('onX');
                $(this)[tog(this.offsetWidth > e.clientX + this.getBoundingClientRect().left)]('onX');
                //console.log(this.offsetWidth);
            }).on('touchstart click', '.onX', function (ev) {
                ev.preventDefault();
                $(this).removeClass('x onX').val('').change();
                $(".dz-preview").fadeIn();
            });
        });
    });

    /*
     $(document).ready(function () {
     $("#search_user_photos").keyup(function () {
     var searchval = $("#search_user_photo").val()
     
     if (searchval) {
     $("#dropzonePreview").attr('style', 'display:none')
     } else {
     $("#dropzonePreview").removeAttr('style', 'display:none')
     }
     
     //  $("div#SearchdropzonePreview").Dropzone.({url: "/admin/getsearch/" + searchval});
     
     $.ajax({
     dataType: "json",
     url: '/admin/getsearch',
     data: {keyword: $('#search_user_photo').val()},
     success: function (result) {
     alert(result);
     },
     });
     
     });
     })
     */
</script>
@stop


