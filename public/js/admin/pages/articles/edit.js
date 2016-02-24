var Article = function () {

    var handleArticleForm = function() {

        $('.form_article').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                title: {
                    required: true
                },
                articleType: {
                    required: true
                }
            },

            messages: {
                title: {
                    required: "Title is required."
                },
                articleType: {
                    required: "Field is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            submitHandler: function(form) {
                $('.form_article').submit(function( event ) {
                    var postData = $(this).serializeArray();
                    var formURL = $(this).attr("action");
                    $.ajax({
                        url : formURL,
                        type: "POST",
                        data : postData,
                        success:function(data, textStatus, jqXHR) 
                        {
                            toastr.clear();
                            toastr.success('Succefull',data.message);
                        },
                        error: function(jqXHR, textStatus, errorThrown) 
                        {
                            toastr.clear();
                            toastr.error('Failed',textStatus);
                        }
                    });
                    event.preventDefault();
                    return false;
                });
            }
        });

        $('.form_article input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.form_article').validate().form()) {
                    $('.form_article').submit(function() {
                     var postData = $(this).serializeArray();
                     var formURL = $(this).attr("action");
                     $.ajax({
                         url : formURL,
                         type: "POST",
                         data : postData,
                         success:function(data, textStatus, jqXHR) 
                        {
                            toastr.clear()
                            toastr.success('Succefull','Changes has been saved');
                        },
                        error: function(jqXHR, textStatus, errorThrown) 
                        {
                            toastr.clear();
                            toastr.error('Failed',textStatus);
                        }
                     });
                     event.preventDefault();
                 }); 
                }
                return false;
            }
        });
    }
    
    return {

        init: function() {
            handleArticleForm();
        },

        initArticle: function (els) {
            var id = ReturnParam('id');
            /* Send the data */
            $.ajax({
                url:"../../../../../canvas/articles/get&id="+id,
                async: true,
                type: "get",
                success: function (json) {
                    $('#title').val(json.data.title);
                    $('#articleTagID').val(json.data.tags.id);
                    $('#id').val(json.data.id);

                    CKEDITOR.replace( 'content', {
                        toolbar: 'Advance',
                        uiColor: '#9AB8F3'
                    });

                    CKEDITOR.instances.content.setData( json.data.content, function()
                    {
                        this.checkDirty();  // true
                    });

                    $('.articleType option[value="'+json.data.tags.article_types_id+'"]').prop('selected', true);
                    if(json.data.featured_image.id != null){
                        var url = json.data.featured_image.url;
                        var img = '<img alt="Image" id="display" src="' + window.location.origin + '/' + url + '" style="width: 125px;" class="logo-default" />'
                        + '<input type="hidden" class="form-control" name="image" id="image" placeholder="Enter text" readonly="true" value="'+json.data.featured_image.id+'">'
                        +  '<a class="btn default" data-toggle="modal" href="#image_selection" onclick="image_selection()">Select a Primary Photo </a>';
                        $("#displayImg").html(img);
                    }
                },
                error: function () {
                    console.log('error');
                }
            });
        },

        initArticleTypes: function (els){

            var url = '../../../../../canvas/articles/types/showall'
            $.ajax({
                url: url,
                async: false,
                type: "get",
                success: function (result) {
                    var options = null;
                    $.each(result.data, function (idx, type) {
                        options = options + '<option value="'+type.id+'">'+type.name+'</option>';
                    });
                    $("#articleType").html(options);
                    
                },
                error: function () {
                    toastr.error('Something went wrong please contact ADMIN', 'ERROR');
                }
            });
    
            $('#UsersTable').DataTable().ajax.reload();

        }

    };
}();

$(document).ready(function() {

    window.ReturnParam = function(sParam){
        //Hakuna matata ^_^
        var sPageURL = window.location.href;
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) {
                return sParameterName[1];
            }
        }
    }

} );// END Ducement Ready
