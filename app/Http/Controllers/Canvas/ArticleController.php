<?php

namespace App\Http\Controllers\Canvas;

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

    //create, delete and updates
    protected function create(Request $request){
        // INITIALIZATION
        $input = $request->all();

        try{
            $article = new Article;
            $article->title = $input['title'];
            $article->author = Auth::user()->id;
            $article->content = $input['content'];

            if (array_key_exists('image', $input)) {
                $article->featured_image = $input['image'];
            }

            $article->save();

            $articleTag = new ArticleTag;
            $articleTag->article_id = $article->id;
            $articleTag->article_types_id = $input['articleType'];
            $articleTag->save();

            return Redirect::to('canvas/articles');

        }catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => $e ));
        }
    }

    protected function delete($id){
        try{
            $article = Article::find($id);
            $article->delete();

            $articleTag = ArticleTag::where('article_id', $id);
            $articleTag->delete();

            return Response::json(array('result'=>'true', 'message'=>'Article successfull Deleted!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
    }

    protected function update(Request $request){
        try{
            $input = $request->all();

            $article = Article::find($input['id']);
            $article->title = $input['title'];
            $article->content = $input['content'];
            if (array_key_exists('image', $input)) {
                $article->featured_image = $input['image'];
            }
            $article->save();

            $articleTag = ArticleTag::find($input['articleTagID']);
            $articleTag->article_types_id = $input['articleType'];
            $articleTag->save();

            return Response::json(array('result'=>'true', 'message'=>"Article Has Been Updated"));

        }catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => $e ));
        }
    }

    //show articles
    protected function getMyArticles()
    {
        return Response::json(array('data' => Article::with(['featured_image'])->where('author', '=', Auth::user()->id)->get() ) ) ;
    }

    protected function getAllArticles()
    {
        return Response::json(array('data' => Article::with(['author'])->with(['featured_image'])->get() ) ) ;
    }

    protected function getArticle($id)
    {
        return Response::json(array('data' => Article::with(['Tags.ArticleType'])->with(['featured_image'])->find($id) )) ;
    }

    protected function activate($id)
    {
        try{
            $article = Article::find($id);
            $article->isPublished = 1;
            $article->save();
            return Response::json(array('result'=>'true', 'message'=>'Article successfull Published!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }   

    protected function deActivate($id)
    {
        try{
            $article = Article::find($id);
            $article->isPublished = 0;
            $article->save();
            return Response::json(array('result'=>'true', 'message'=>'Article successfull Unpublished!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }  

}
