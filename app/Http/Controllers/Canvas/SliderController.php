<?php

namespace App\Http\Controllers\Canvas;

use App\Models\Slider;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        return Response::json(array('data' => Slider::with(['image'])->get()  )) ;
    }

    public function create(Request $request){
        $input = $request->all();
        try{
            var_dump($input);
            $slider = new Slider;
            $slider->title = $input['title'];
            if (array_key_exists('image', $input)) {
                $slider->image_id = $input['image'];
            }
            $slider->save();

            return Redirect::to('canvas/pages/slider');

        }catch(Exception $e){

            return Response::json(array('result'=>'false','message'=>'Server Error'));

        }
        
    }

    public function delete($id){
        try{
            $slider = Slider::find($id);
            $slider->delete();

            return Response::json(array('result'=>'true','message'=>'Slider Succesfully Deleted'));
        }catch(Exception $e){
            return Response::json(array('result'=>'false','message'=>'Server Error'));
        }
    }

    protected function activate($id)
    {
        try{
            $article = Slider::find($id);
            $article->status = 1;
            $article->save();
            return Response::json(array('result'=>'true', 'message'=>'Slider Succesfully Published!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }   

    protected function deActivate($id)
    {
        try{
            $article = Slider::find($id);
            $article->status = 0;
            $article->save();
            return Response::json(array('result'=>'true', 'message'=>'Slider Succesfully Unpublished!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }  

}
