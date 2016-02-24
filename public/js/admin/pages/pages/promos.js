var Promos = function () {

    var handlePromosList = function() {
        $('#PromoTable').DataTable( {
                "ajax": "../../../../../canvas/pages/promos/getall",
                        
                "columns": [
                    { "data": "title" },
                    {
                        sortable: true,
                        "render": function ( data, type, promo, meta ) {
                            if(promo.status == 0){
                                return '<a class="btn btn-warning" >Unpublished</a>';
                            }
                            else{
                                return '<a class="btn btn-success" >Published</a>';
                            }
                        }
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, promo, meta ) {
                            if(promo.image != null){
                                var image_url = promo.image.url;
                                return '<img src="'+image_url+'" style="width: 50px;">';
                            }else{
                                return '<img src="/uploads/images/default_image.png" style="width: 50px;">';
                            }
                            
                        }
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, promo, meta ) {
                            var _statusAction = '<a onclick="alert('+promo.id+',\' Are you sure you want to UNPUBLISHED this ('+promo.title+') ? \', \'deactivatePromo\' )" data-toggle="modal" href="#messageAlert" class="btn btn-warning deleteBtn" >Unpublish</a>';

                            if(promo.status == 0){
                                _statusAction = '<a onclick="alert('+promo.id+',\' Are you sure you want to PUBLISH this ('+promo.title+') ? \', \'activatePromo\' )" data-toggle="modal" href="#messageAlert" class="btn btn-success" >Publish</a>'
                            }

                            var content = _statusAction
                                        + '<a onclick="alert('+promo.id+',\' Are you sure you want to REMOVE article ( '+promo.title+' ) ? \', \'deletePromo\' )" data-toggle="modal" href="#messageAlert" class="btn btn-danger deleteBtn" >Delete</a>'
                                        ;
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

    // actions
    

    // functions
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


    window.deletePromo = function($id){
        var url = '../../../../../canvas/pages/promos/delete&id='+$id
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

        $('#PromoTable').DataTable().ajax.reload();
    }

    window.deactivatePromo = function($id){
        var url = '../../../../../canvas/pages/promos/unpublish&id='+$id
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

        $('#PromoTable').DataTable().ajax.reload();
    }

    window.activatePromo = function($id){
        var url = '../../../../../canvas/pages/promos/publish&id='+$id
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

        $('#PromoTable').DataTable().ajax.reload();
    }


} );// END Ducement Ready