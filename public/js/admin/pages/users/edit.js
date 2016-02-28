var User = function () {

    var handEditForm = function() {

        $('.form_edit_user').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                },
                accessType: {
                    required: true
                },
                positionTitle: {
                    required: true
                }
            },

            messages: {
                email: {
                    required: "Email is required.",
                    email: "Not a Valid Email",
                    remote: "Email already in use!"
                },
                password: {
                    required: "Password is required."
                },
                accessType: {
                    required: "Field is required."
                },
                positionTitle: {
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

            // errorPlacement: function(error, element) {
            //     if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
            //         error.insertAfter($('#register_tnc_error'));
            //     } else if (element.closest('.input-icon').size() === 1) {
            //         error.insertAfter(element.closest('.input-icon'));
            //     } else {
            //         error.insertAfter(element);
            //     }
            // },

            submitHandler: function(form) {
                $('.form_edit_user').submit(function( event ) {
                    var postData = $(this).serializeArray();
                    var formURL = $(this).attr("action");
                    $.ajax({
                        url : formURL,
                        type: "POST",
                        data : postData,
                        success:function(data, textStatus, jqXHR) 
                        {
                            toastr.clear();
                            toastr.success('Succefull','Changes has been saved');
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

        $('.form_edit_user input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.form_edit_user').validate().form()) {
                    $('.form_edit_user').submit(function() {
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

        // jQuery('#register-btn').click(function() {
        //     jQuery('.login-form').hide();
        //     jQuery('.register-form').show();
        // });

        // jQuery('#register-back-btn').click(function() {
        //     jQuery('.login-form').show();
        //     jQuery('.register-form').hide();
        // });
    }
    
    return {

        init: function() {
            handEditForm();
        },

        initUser: function (els) {
            var id = ReturnParam('id');
            /* Send the data */
            $.ajax({
                url:"../../../../../canvas/users/get&id="+id,
                async: true,
                type: "get",
                success: function (json) {
                    $('#id').val(json.data.id);
                    $('#email').val(json.data.email);
                    $('#positionTitle').val(json.data.user_position);
                    $('.accessType option[value="'+json.data.user_access+'"]').prop('selected', true);
                    if(json.data.image_id != null){
                        var url = json.data.image.url;
                        var img = '<img alt="Image" id="display" src="' + window.location.origin + '/' + url + '" style="width: 125px;" class="logo-default" />'
                        + '<input type="hidden" class="form-control" name="image" id="image" placeholder="Enter text" readonly="true" value="'+json.data.image.id+'">'
                        +  '<a class="btn default" data-toggle="modal" href="#image_selection" onclick="loadImageTable()">Select a Primary Photo </a>'
                        +  '<a class="btn btn-danger" onclick="removeImage()">Remove Primary Photo </a>';
                        $("#displayImg").html(img);
                    }
                },
                error: function () {
                    console.log('error');
                }
            });
        },

        initImages: function (els) {
            $('#imageTable').DataTable( {
                "ajax": "../../../../../canvas/images/show",
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                "columns": [
                    {
                        sortable: false,
                        "render": function ( data, type, image, meta ) {
                            var image_url = image.url;
                            return '<img src="'+image_url+'" style="width: 150px;">';
                        }
                    },
                    { "data": "url" },
                    {
                        sortable: false,
                        "render": function ( data, type, image, meta ) {
                            var img_url = image.url;
                            img_url = "'" + img_url + "'";
                            // var content = '<a   href="#" class="btn " >Edit</a>'
                                        // + '<a onclick="notifyDelete('+image.id+')" data-toggle="modal" href="#alert" class="btn btn-danger deleteBtn" >Delete</a>'
                            var content = '<a data-dismiss="modal"  onclick="selectImage('+image.id+','+img_url+')" class="btn btn-success" >Select</a>';
                            return content;
                        }
                    },
                ]
            } );
        }

    };
}();

$(document).ready(function() {

    window.refreshTable = function(){
                $('#image_selection').DataTable().ajax.reload();
                console.log("refresh")
            }

    window.loadImageTable = function(){
        $('#imageTable').DataTable().ajax.reload();
        
    }
    window.selectImage = function(id,url){
        
        var img = '<img alt="Image" id="display" src="' + window.location.origin + '/' + url + '" style="width: 125px;" class="logo-default" />'
        + '<input type="hidden" class="form-control" name="image" id="image" placeholder="Enter text" readonly="true" value="'+id+'">'
        +  '<a class="btn default" data-toggle="modal" href="#image_selection" onclick="loadImageTable()">Select a Primary Photo </a>';
        $("#displayImg").html(img);
        console.log(id + ' - ' + url + ' - ' + img);
    }
    
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
