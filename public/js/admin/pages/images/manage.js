var Images = function () {
    
    return {

        initImages: function (els) {
            $('#imageTable').DataTable( {
                "ajax": "../../../../../canvas/images/show",
                "columns": [
                    {
                        sortable: false,
                        "render": function ( data, type, image, meta ) {
                            var image_url = image.url;
                            return '<img src="'+image_url+'" style="width: 150px;">';
                        }
                    },
                    { "data": "filename" },
                    { "data": "url" },
                    {
                        sortable: false,
                        "render": function ( data, type, image, meta ) {
                            // var content = '<a   href="#" class="btn " >Edit</a>'
                                        // + '<a onclick="notifyDelete('+image.id+')" data-toggle="modal" href="#alert" class="btn btn-danger deleteBtn" >Delete</a>'
                            var content = '<a onclick="notifyDelete('+image.id+')" data-toggle="modal" href="#alert" class="btn btn-danger deleteBtn" >Delete</a>';
                            return content;
                        }
                    },
                ]
            } );
        }

    };
}();

$(document).ready(function() {

    
    window.notifyDelete = function(id){
        var _anchor = '<button type="button" class="btn default" data-dismiss="modal">Close</button>'
            + '<a type="button" class="btn blue" data-dismiss="modal" onclick="deleteImage('+id+')">Save changes</a>';
        $("#modal_footer").html(_anchor);
    }

    window.deleteImage = function(id){
        /* Send the data */
    $.ajax({
        url: "../../../../../../canvas/images/delete&id="+id,
        async: false,
        type: "get",
        success: function (json) {
            toastr.success('Success!', 'Deleting Successful');
            $('alert').attr('data-dismiss','modal');
            $('#imageTable').DataTable().ajax.reload();
        },
        error: function(json){
            toastr.error(json.result, json);
            $('alert').attr('data-dismiss','modal');
        }
    });
    }

} );// END Ducement Ready