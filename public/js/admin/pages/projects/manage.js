var Project = function () {

    var handleProjectList = function() {
        $('#ProjectsTable').DataTable( {
                "ajax": "../../../../../canvas/projects/getAllProjects",
                "columns": [
                    { "data": "title" },
                    {
                        sortable: true,
                        "render": function ( data, type, article, meta ) {
                            if(article.isPublished == 0){
                                return '<a class="btn btn-warning" >Unpublished</a>';
                            }
                            else{
                                return '<a class="btn btn-success" >Published</a>';
                            }
                        }
                    },
                    { "data": "updated_at" },
                    {
                        sortable: false,
                        "render": function ( data, type, project, meta ) {
                            var _statusAction = '<a onclick="alert('+project.id+',\' Are you sure you want to UNPUBLISHED this ('+project.title+') ? \', \'deactivateProject\' )" data-toggle="modal" href="#messageAlert" class="btn btn-warning deleteBtn" >Unpublish</a>';

                            if(project.isPublished == 0){
                                _statusAction = '<a onclick="alert('+project.id+',\' Are you sure you want to PUBLISH this ('+project.title+') ? \', \'activateProject\' )" data-toggle="modal" href="#messageAlert" class="btn btn-success" >Publish</a>'
                            }

                            var content = '<a   href="/canvas/projects/edit&id='+project.id+'" class="btn " >Edit</a>'
                                        + _statusAction
                                        + '<a onclick="alert('+project.id+',\' Are you sure you want to REMOVE article ( '+project.title+' ) ? \', \'deleteProject\' )" data-toggle="modal" href="#messageAlert" class="btn btn-danger deleteBtn" >Delete</a>'
                                        ;
                            return content;
                        }
                    }
                ]
            } );
    }
    
    return {

        init: function() {
            handleProjectList();
        }

    };
}();

$(document).ready(function() {

    // actions
    

    // functions
    window.deleteProject = function($id){
        var url = '../../../../../canvas/projects/delete&id='+$id
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

        $('#ProjectsTable').DataTable().ajax.reload();
    }

    window.deactivateProject = function($id){
        var url = '../../../../../canvas/projects/unpublish&id='+$id
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

        $('#ProjectsTable').DataTable().ajax.reload();
    }

    window.activateProject = function($id){
        var url = '../../../../../canvas/projects/publish&id='+$id
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

        $('#ProjectsTable').DataTable().ajax.reload();
    }


} );// END Ducement Ready