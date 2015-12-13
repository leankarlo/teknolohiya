var Articles = function () {

    var handleArticleList = function() {
        $('#ArticlesTable').DataTable( {
                "ajax": "../../../../../canvas/articles/getall",
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
                    { "data": "author.email" },
                    { "data": "updated_at" },
                    {
                        sortable: false,
                        "render": function ( data, type, article, meta ) {
                            var _statusAction = '<a onclick="alert('+article.id+',\' Are you sure you want to UNPUBLISHED this ('+article.title+') ? \', \'deactivateArticle\' )" data-toggle="modal" href="#messageAlert" class="btn btn-warning deleteBtn" >Unpublish</a>';

                            if(article.isPublished == 0){
                                _statusAction = '<a onclick="alert('+article.id+',\' Are you sure you want to PUBLISH this ('+article.title+') ? \', \'activateArticle\' )" data-toggle="modal" href="#messageAlert" class="btn btn-success" >Publish</a>'
                            }

                            var content = _statusAction
                                        + '<a onclick="alert('+article.id+',\' Are you sure you want to REMOVE article ( '+article.title+' ) ? \', \'deleteArticle\' )" data-toggle="modal" href="#messageAlert" class="btn btn-danger deleteBtn" >Delete</a>'
                                        ;
                            return content;
                        }
                    }
                ]
            } );
    }
    
    return {

        init: function() {
            handleArticleList();
        }

    };
}();

$(document).ready(function() {

    // actions
    

    // functions
    window.deleteArticle = function($id){
        var url = '../../../../../canvas/articles/delete&id='+$id
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

        $('#ArticlesTable').DataTable().ajax.reload();
    }

    window.deactivateArticle = function($id){
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

        $('#ArticlesTable').DataTable().ajax.reload();
    }

    window.activateArticle = function($id){
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

        $('#ArticlesTable').DataTable().ajax.reload();
    }


} );// END Ducement Ready