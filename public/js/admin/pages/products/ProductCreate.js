var ProductCreate = function () {

    var handleProductForm = function() {

        $('.form_product').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                image: {
                    required: true
                },
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
                // EnableSubmitToEditButton();
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
                            toastr.success('Succefull',data.id);
                            $('#product_id').val(data.id);
                            EnableSubmitToEditButton();
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
        $('#product_status').prop("disabled",true);
    }

    window.EnableSubmitToEditButton = function(){
        $('#submitAndContinue').prop("disabled",false);
        $('#delete').prop("disabled",false);
        $('#tab_category').prop("disabled",false);
        $('#tab_images').prop("disabled",false);
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