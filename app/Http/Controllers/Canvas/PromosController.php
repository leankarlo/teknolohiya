<?php

namespace App\Http\Controllers\Canvas;

use App\Models\Promo;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromosController extends Controller
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
    protected function getAll()
    {
        return Response::json(array('data' => Promo::all() )) ;
    }

    public function create(Request $request){
        $input = $request->all();
        try{

            $slider = new Promo;
            $slider->title = $input['title'];
            $slider->image_id = $input['image'];
            $slider->save();

            return Redirect::to('canvas/pages/promos');

        }catch(Exception $e){

            return Response::json(array('result'=>'false','message'=>'Server Error'));

        }
        
    }

    public function delete($id){
        try{
            $slider = Promo::find($id);
            $slider->delete();

            return Response::json(array('result'=>'true','message'=>'Promo Succesfully Deleted'));
        }catch(Exception $e){
            return Response::json(array('result'=>'false','message'=>'Server Error'));
        }
    }

    protected function activate($id)
    {
        try{
            $article = Promo::find($id);
            $article->status = 1;
            $article->save();
            return Response::json(array('result'=>'true', 'message'=>'Promo Succesfully Published!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }   

    protected function deActivate($id)
    {
        try{
            $article = Promo::find($id);
            $article->status = 0;
            $article->save();
            return Response::json(array('result'=>'true', 'message'=>'Promo Succesfully Unpublished!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }  

}
