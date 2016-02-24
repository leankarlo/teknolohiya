var Project = function () {

    var handleProjectForm = function() {

        $('.form_project').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                title: {
                    required: true
                },
                projectType: {
                    required: true
                }
            },

            messages: {
                title: {
                    required: "Title is required.",
                    remote: "Title already in use!"
                },
                projectType: {
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
                form.submit();
            }
        });

        $('.form_project input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.form_project').validate().form()) {
                    $('.form_project').submit();
                }
                return false;
            }
        });
    }
    
    return {

        init: function() {
            handleProjectForm();
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

        initProjectTypes: function (els){

            var url = '../../../../../canvas/projects/types/showall'
            $.ajax({
                url: url,
                async: false,
                type: "get",
                success: function (result) {
                    var options = null;
                    $.each(result.data, function (idx, type) {
                        options = options + '<option value="'+type.id+'">'+type.name+'</option>';
                    });
                    $("#projectType").html(options);
                    
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

} );// END Ducement Ready