var ProductCreate = function () {

    var handleProductForm = function() {

        $('.form_product').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                product_name: {
                    minlength: 2,
                    required: true
                },
                product_description: {
                    minlength: 10,
                    required: true
                },
                product_price: {
                    minlength: 1,
                    required: true
                }
            },

            messages: {
                product_name: {
                    required: "Product Name is required."
                },
                product_description: {
                    required: "Description is required."
                },
                product_price: {
                    required: "Product Price is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                toastr.clear();
                toastr.error('Failed','Misssing or Invalid Input');
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
                EnableSubmitToEditButton();
            },

            submitHandler: function(form) {
                $('.form_product').submit(function( event ) {
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

        // $('.form_product input').keypress(function(e) {
        //     if (e.which == 13) {
        //         if ($('.register-form').validate().form()) {
        //             $('.register-form').submit();
        //         }
        //         return false;
        //     }
        // });

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
            handleProductForm();
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
        },

    };
}();

$(document).ready(function() {

    //actions
    $("#submit").click( function() {
        $('#form_product').submit();
    }); 

    //functions
    window.DisableSubmitToEditButton = function(){
        $('#submitAndContinue').prop("disabled",true);
        $('#delete').prop("disabled",true);
        $('#tab_category').prop("disabled",true);
        $('#tab_images').prop("disabled",true);
    }

    window.EnableSubmitToEditButton = function(){
        $('#submitAndContinue').prop("disabled",false);
        $('#delete').prop("disabled",false);
        $('#tab_category').prop("disabled",false);
        $('#tab_images').prop("disabled",false);
    }


} );// END Ducement Ready