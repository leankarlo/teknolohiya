<?php

namespace App\Http\Controllers\App;

use App\Models\Article;
use App\Models\ArticleType;
use App\Models\ArticleTag;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Article Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the Images functions
    | 1. Upload
    | 2. Edit
    | 3. Delete
    |
    */

    //show functions
    protected function getArticleTypes()
    {
        return Response::json(array('data' => ArticleType::all() )) ;
    }

    protected function getAllArticles()
    {
        return Response::json(array('data' => Article::with(['author.image'])->with(['featured_image'])->where('isPublished', 1)->get() ) ) ;
    }

    protected function getArticle($id)
    {
        return Response::json(array('data' => Article::with(['Tags.ArticleType'])->with(['featured_image'])->find($id) )) ;
    }

}
