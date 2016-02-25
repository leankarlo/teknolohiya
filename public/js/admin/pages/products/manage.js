var Products = function () {

    var handleList = function() {

        var table = $('#Table');

        table.DataTable( {
                "ajax": "../../../../../canvas/products/getall",
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                "columns": [
                    {
                        "render": function ( data, type, data, meta ) {
                            return '<input type="checkbox" class="checkboxes" value="'+data.id+'"/>'
                        }      
                    },
                    {
                        "render": function ( data, type, data, meta ) {
                            if(data.image != null){
                                var image_url = data.image.url;
                                var imgHtml = '<a src="'+image_url+'" class="fancybox-button" data-rel="fancybox-button">'
                                + '<img class="img-responsive" src="'+image_url+'" alt="" height="100px" width="100px">'
                                + '</a>'
                                return imgHtml;
                            }
                            else{
                                return 'N/A';
                            }
                        }      
                    },
                    { "data": "name" },
                    {
                        "render": function ( data, type, data, meta ) {
                            var _statusAction = '<a onclick="alert('+data.id+',\' Are you sure you want to UNPUBLISHED this ('+data.name+') ? \', \'deactivate\' )" data-toggle="modal" href="#messageAlert" class="btn btn-warning deleteBtn" >Unpublish</a>';

                            if(data.isPublished == 0){
                                _statusAction = '<a onclick="alert('+data.id+',\' Are you sure you want to PUBLISH this ('+data.name+') ? \', \'activate\' )" data-toggle="modal" href="#messageAlert" class="btn btn-success" >Publish</a>'
                            }

                            var content = '<a   href="#createProduct" data-toggle="modal" onclick="loadProductForEditing('+data.id+')" class="btn " >Edit</a>'
                                        + _statusAction
                                        ;
                            return content;
                        }
                    }
                ]
            } );

            var tableWrapper = jQuery('#Table_wrapper');
    
            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).attr("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
                jQuery.uniform.update(set);
            });
    
            table.on('change', 'tbody tr .checkboxes', function () {
                $(this).parents('tr').toggleClass("active");
            });
    
            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); 
    }
    
    return {

        init: function() {
            handleList();
        }

    };
}();

$(document).ready(function() {

    // functions
    window.deactivate = function($id){
        var url = '../../../../../canvas/articles/unpublish&id='+$id
        $.ajax({
            url: url,
            async: false,
            type: "get",
            success: function (data) {
                if(data.result == 'true'){
                    toastr.success(data.message, data.result);
                }
                else{
                    toastr.error(data.message, data.result);
                }
                
            },
            error: function () {
                toastr.error('Something went wrong please contact ADMIN', 'ERROR');
            }
        });

        $('#Table').DataTable().ajax.reload();
    }

    window.activate = function($id){
        var url = '../../../../../canvas/articles/publish&id='+$id
        $.ajax({
            url: url,
            async: false,
            type: "get",
            success: function (data) {
                if(data.result == 'true'){
                    toastr.success(data.message, data.result);
                }
                else{
                    toastr.error(data.message, data.result);
                }
                
            },
            error: function () {
                toastr.error('Something went wrong please contact ADMIN', 'ERROR');
            }
        });

        $('#Table').DataTable().ajax.reload();
    }

} );// END Ducement Ready