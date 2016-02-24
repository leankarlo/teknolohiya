var Contact = function () {

    var handlePromosList = function() {
        $('#Table').DataTable( {
                "ajax": "../../../../../canvas/pages/contact/getall",
                "columns": [
                    {
                        sortable: false,
                        "render": function ( data, type, data, meta ) {
                            var _edit = '<a   href="#edit" data-toggle="modal" onclick="edit('+data.id+')" class="btn" >Edit</a>';

                            var _statusAction = '<a   href="/canvas/contact/edit&id='+data.id+'" class="btn" >Edit</a>' + '<a onclick="alert('+data.id+',\' Are you sure you want to UNPUBLISHED this ('+data.name+') ? \', \'deactivate\' )" data-toggle="modal" href="#messageAlert" class="btn btn-warning deleteBtn" >Unpublish</a>';

                            if(data.isPublished == 0){
                                _statusAction = '<a onclick="alert('+data.id+',\' Are you sure you want to PUBLISH this ('+data.name+') ? \', \'activate\' )" data-toggle="modal" href="#messageAlert" class="btn btn-success" >Publish</a>'
                            }

                            var content = _edit + _statusAction
                                        + '<a onclick="alert('+data.id+',\' Are you sure you want to REMOVE Slider ( '+data.name+' ) ? \', \'deleteItem\' )" data-toggle="modal" href="#messageAlert" class="btn btn-danger deleteBtn" >Delete</a>'
                                        ;
                            return content;
                        }
                    },
                    { "data": "name" },
                    {
                        sortable: false,
                        "render": function ( data, type, data, meta ) {
                            var content = "" + data.address1 + " " + data.address2 + " " + data.address3 + " " + data.address4 + ", " + data.address5 + ", " + data.country + "";
                            return content;
                        }
                    }
                ]
            } );
    }
    
    return {

        init: function() {
            handlePromosList();
        },

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

    // actions
    

    // functions
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
    
    window.deleteItem = function($id){
        console.log("Delete")
        var url = '../../../../../canvas/pages/contact/delete&id='+$id
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

        $('#Table').DataTable().ajax.reload();
    }

    window.deactivate = function($id){
        var url = '../../../../../canvas/pages/contact/unpublish&id='+$id
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
        var url = '../../../../../canvas/pages/contact/publish&id='+$id
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

    window.edit = function(id){

        $.ajax({
            url: "../../../../../canvas/pages/contact/get&id="+id,
            async: false,
            type: "get",
            success: function (data) {
                $('#edit_id').val(data.id); 
                $('#edit_name').val(data.name);                
                $('#edit_address1').val(data.address1);
                $('#edit_address2').val(data.address3);
                $('#edit_address3').val(data.address3);
                $('#edit_address4').val(data.address4);
                $('#edit_address5').val(data.address5);
                $('#edit_country').val(data.country);
                $('#edit_zipcode').val(data.zipcode);
                $('#edit_mobile1').val(data.mobile1);
                $('#edit_mobile2').val(data.mobile2);
                $('#edit_mobile3').val(data.mobile3);
                $('#edit_landline1').val(data.landline1);
                $('#edit_landline2').val(data.landline2);
                $('#edit_landline3').val(data.landline3);
                $('#edit_fax1').val(data.fax1);
                $('#edit_fax2').val(data.fax2);
                $('#edit_fax3').val(data.fax3);
                $('#edit_email1').val(data.email1);
                $('#edit_email2').val(data.email2);
                $('#edit_email3').val(data.email3);
                $('#edit_long').val(data.long);
                $('#edit_lat').val(data.lat);             
            },
            error: function () {
                toastr.error('Error', 'Connection Error Please Contact System Admin');
            }
        });
    }


} );// END Ducement Ready