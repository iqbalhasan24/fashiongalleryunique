//$(window).on('hashchange', function () {
//    if (window.location.hash) {
//        var page = window.location.hash.replace('#', '');
//        if (page == Number.NaN || page <= 0) {
//            return false;
//        } else {
//            getPosts(page);
//        }
//    }
//});
function loader_show() {
    var effect = "text";
    $('body').addClass('waitMe_body');
    var img = '';
    var text = '';
    img = 'background-image:url(\'/images/anim-loading.gif\');height: 80px;background-repeat: no-repeat;background-position: center;';
    text = '';
    var elem = $('<div class="waitMe_container ' + effect + '"><div style="' + img + '">' + text + '</div></div>');
    $('body').prepend(elem);
}
function loader_hide() {
    $('body.waitMe_body').addClass('hideMe');
    $('body.waitMe_body').find('.waitMe_container:not([data-waitme_id])').remove();
    $('body.waitMe_body').removeClass('waitMe_body hideMe');
}
function getPosts(type, page) {
    loader_show();
    var keyword = $('#search input[name="keyword"]').val();
    var campaign_id = $('#selSnips').val();
    var tag_id = $('#tag_id').val();
    if (keyword != "") {
        var query = "keyword=" + keyword + "&tag_id=" + tag_id + "&campaign_id=" + campaign_id + "&page=" + page + ""
    } else {
        var query = "tag_id=" + tag_id + "&campaign_id=" + campaign_id + "&page=" + page + ""
    }
    if (type == "all") {
        var url = '/media/mediaPagination?' + query
    } else {
        var url = '/media/userPagination?' + query
    }
    $.ajax({
        url: url
    }).done(function (data) {
        if (type == "all") {
            $('#my-tab-content').html(data);
        } else {
            $('.user-images').html(data);
        }
        loader_hide();
    })
}
$(document).ready(function () {

    $(document).on('click', '.all-images .pagination a', function (e) {
        getPosts("all", $(this).attr('href').split('page=')[1]);
        return false;
    });
    $(document).on('click', '.user-images .pagination a', function (e) {
        getPosts("userWise", $(this).attr('href').split('page=')[1]);
        return false;
    });

    $(document).on('keyup', "input[name='keyword']", function (e) {
        var keyword = $('#search input[name="keyword"]').val();
        var tag_id = $('#tag_id').val();
        var campaign_id = $('#selSnips').val();
        $.ajax({
            url: '/media/search',
            type: 'post',
            data: {keyword: keyword, tag_id: tag_id, campaign_id: campaign_id}
        }).done(function (data) {
            jQuery('#my-tab-content').html(data);
        })
        return false;
    });
    $(document).on('click', '.uploadImage', function (e) {
        loader_show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('form input').val()
            }
        });
        var file_data = $("#uploadUserImage #image").prop("files")[0];   // Getting the properties of file from file field
        var form_data = new FormData();                  // Creating object of FormData class
        form_data.append("image", file_data)              // Appending parameter named file with properties of file_field to form_data
        form_data.append("campaign_id", $('#selSnips').val())
        form_data.append("tag_id", $('#tag_id').val())

//        console.log(form_data);
//        return false;
        $.ajax({
            url: '/admin/media/uploads',
            type: 'POST',
            data: form_data,
            cache: false,
            contentType: false,
            dataType: 'json',
            processData: false
        }).done(function (data) {
            $('#uploadUserImage').find('.has-error span strong').text('');
            $('#uploadUserImage').find('.has-error').removeClass('has-error');
            if (data.success == 1) {
                $('#uploadUserImage')[0].reset();
                $('ul.builder-image').prepend('<li><img height="130" alt="' + data.alt + '" src="' + data.image + '"><p>' + data.title + ' ' + data.dimension + '</p></li>');
            }
            loader_hide();
        }).fail(function (data) {
            if (data.status === 422) {
                $('#uploadUserImage').find('.has-error span strong').text('');
                $('#uploadUserImage').find('.has-error').removeClass('has-error');
                $.each(data.responseJSON, function (key, value) {
                    if (key == "image") {
                        var input = '#uploadUserImage input[name=' + key + ']';
                        $(input + '+span>strong').text(value);
                        $(input).parent().addClass('has-error');
                    }
                    if (key == "campaign_id") {
                        var select = '#uploadUserImage select[name=' + key + ']';
                        $(select + '+span>strong').text(value);
                        $(select).parent().addClass('has-error');
                    }
                });
                loader_hide();
            }
        });
        return false;
    });

    $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
        var _href = $(this).attr('href');
        if (_href == "#orange") {
            $('#search').css('display', 'none');
        } else {
            $('#search').css('display', 'block');
        }
    })
});


/* For campagin id loading into modal */
$(document).ready(function(){
    $(".campaign-id-load-into-modal").click(function(){
        $("#createTemplateForm #campaign_id").val($('#selSnips').val());
    })  
     $("#openModal").click(function(){
        $("#saveTemplateModal #campaign_id").val($('#selSnips').val());
    })    
    
    
})