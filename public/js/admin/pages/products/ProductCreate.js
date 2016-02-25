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

        initCategory: function(){
            //category select
            var url = '../../../../../canvas/products/category/getall'
            $.ajax({
                url: url,
                async: false,
                type: "get",
                success: function (result) {
                    if(result.result == 'true'){

                        var options ='';
                        $.each(result.data, function(index, item) {
                            options += "<option value='" + item.id + "'>" + item.name + "</option>";
                        });
                        $("#product_category").html(options);
    
                    }
                    else{
                        toastr.error(result.message, result.result);
                    }
                    
                },
                error: function () {
                    toastr.error('Something went wrong please contact ADMIN', 'ERROR');
                }
            });
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
        $( ".tabbable" ).tabs();
        $( ".tabbable" ).tabs("option", 'disabled', [1,2]);
    }

    window.EnableSubmitToEditButton = function(){
        $('#submitAndContinue').prop("disabled",false);
        $('#submit').prop("disabled",true);
        $('#delete').prop("disabled",false);
        $( ".tabbable" ).tabs();
        $( ".tabbable" ).tabs("enable");
    }

    window.clear = function(){
        $('#product_id').val("");
        $('#product_name').val("");
        $('#product_description').val("");
        $('#product_price').val("");
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

    window.loadProductForEditing = function(id){
        var url = '../../../../../canvas/products/get&id='+id

        $.ajax({
            url: url,
            async: false,
            type: "get",
            success: function (result) {
                if(result.result == 'true'){
                    $('#product_id').val(result.data.id);
                    $('#product_name').val(result.data.name);
                    $('#product_description').val(result.data.description);
                    $('#product_price').val(result.data.price);
                    
                    $('#product_status option[value="'+result.data.isPublished+'"]').prop('selected', true);

                    if(result.data.image != null){
                        var url = result.data.image.url;
                        var img = '<img alt="Image" id="display" src="' + window.location.origin + '/' + url + '" style="width: 125px;" class="logo-default" />'
                        + '<input type="hidden" class="form-control" name="image" id="image" placeholder="Enter text" readonly="true" value="'+result.data.image.id+'">'
                        +  '<a class="btn default" data-toggle="modal" href="#image_selection" onclick="loadImageTable()">Select a Primary Photo </a>';
                        $("#displayImg").html(img);
                    }
                    $('#ProductCategoryTable').DataTable().destroy();
                    loadProductCategory(result.data.id);
                    loadProductImage(result.data.id);
                }
                else{
                    toastr.error(result.message, result.result);
                }
                
            },
            error: function () {
                toastr.error('Something went wrong please contact ADMIN', 'ERROR');
            }
        });
    }

    window.loadProductCategory = function(id){

        $('#ProductCategoryTable').DataTable( {
            "ajax": "../../../../../canvas/products/category/get&id="+id,
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            "columns": [
                { "data": "product_category.name" },
                {
                    sortable: false,
                    "render": function ( data, type, result, meta ) {
                        var content = '<a onclick="alert('+result.id+',\' Are you sure you want to REMOVE this Category ( '+result.product_category.name+' ) ? \', \'deleteItem\' )" data-toggle="modal" href="#messageAlert" class="btn btn-danger deleteBtn" >Delete</a>'
                                    ;
                        return content;
                    }
                },
            ]
        } );
        $('#ProductCategoryTable').DataTable().ajax.reload();
    }

    window.loadProductImage = function(id){
        
    }

    window.deleteItem = function($id){
        var url = '../../../../../canvas/products/category/delete&id='+$id
        $.ajax({
            url: url,
            async: false,
            type: "get",
            success: function (data) {
                if(data.result == 'true'){
                    toastr.success('Succesfull', data.result);
                }
                else{
                    toastr.error('Succesfull', data.result);
                }
                
            },
            error: function () {
                toastr.error('Something went wrong please contact ADMIN', 'ERROR');
            }
        });

        $('#ProductCategoryTable').DataTable().ajax.reload();
    }

    window.addSelectedCategory = function(){
        var id = $('#product_category').val();
        var product_id = $('#product_id').val();

        var url = '../../../../../canvas/products/category/add&id='+id+'&product_id='+product_id;
        console.log(url);
        $.ajax({
            url: url,
            async: false,
            type: "get",
            success: function (data) {
                if(data.result == 'true'){
                    toastr.success('Succesfull', data.result);
                }
                else{
                    toastr.error('Succesfull', data.result);
                }
            },
            error: function () {
                toastr.error('Something went wrong please contact ADMIN', 'ERROR');
            }
        });
        $('#ProductCategoryTable').DataTable().ajax.reload();
    }

} );// END Ducement Ready

