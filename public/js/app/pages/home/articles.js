var Articles = function () {

    var handleArticleList = function() {
        var articles = '';
        var url = '../../../../../articles/getall'
        $.ajax({
            url: url,
            async: false,
            type: "get",
            success: function (result) {
                $.each(result.data, function (idx, article) {
                    var content = article.content;
                    var contentFiltered = $(content).text();
                    articles = articles
                        +   '<div class="col-md-4 col-xs-6">'
                        +    '    <article class="blog-posts">'
                        +    '        <header>'
                        +    '            <a class="blog-post-image" href="article/post&id'+article.id+'">'
                        +    '                <img src="'+article.featured_image.url+'" alt="Blog post 1">'
                        +    '            </a>'
                        +    '            <div class="blog-post-author">'
                        +    '                <div class="blog-post-author-image">'
                        +    '                    <img src="'+article.author.image.url+'" alt="Blog Post Author">'
                        +    '                </div>'
                        +    '                <div class="blog-post-author-details">By <span class="author-name">'+article.author.email+'</span> on <time datetime="2014-09-10 17:00">'+article.updated_at+'</time></div>'
                        +    '            </div>'
                        +    '            <h2 class="blog-post-title">'+article.title+'</h2>'
                        +    '        </header>'
                        +    '        <div class="blog-post-content" style="Margin: 10px !important;">'+contentFiltered.substring(0,150)+'...</div>'
                        +    '        <footer>'
                        +    '            <a href="article/post&id'+article.id+'" class="more">Read more</a>'                    
                        +    '        </footer>'
                        +    '    </article>'
                        +    '</div>'
                        ;
                        console.log(articles);
                });
                
            },
            error: function () {

            }
        });

        $('.blog-masonry').html(articles);

    }
    
    return {

        init: function() {
            handleArticleList();
        }

    };
}();

$(document).ready(function() {




} );// END Ducement Ready