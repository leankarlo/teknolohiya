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

} );// END Ducement Ready