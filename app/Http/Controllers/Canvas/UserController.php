<?php

namespace App\Http\Controllers\Canvas;

use App\Models\User;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Images Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the Images functions
    | 1. Upload
    | 2. Edit
    | 3. Delete
    | 4. Activate
    | 5. Deactivate
    | 6. Validation
    |
    */

    // USER DISPLAYS
    protected function showAll()
    {
        return Response::json(array('data' => User::with(['image'])->get() ) );
    }

    // USER MANAGEMENT
    protected function create(Request $request)
    {
        // INITIALIZATION
        $input = $request->all();

        // CREATE USER
        $user = new User;
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->isActive = 1;
        $user->user_access = $input['accessType'];
        $user->user_position = $input['positionTitle'];
        if(isset($input['image'])){
            $user->image_id =   $input['image'];
        }
        $user->save();

        return Redirect::to('canvas/users/management');
    }

    protected function getUser($id){
        $user = User::with(['image'])->find($id);
        return Response::json(array('result'=>'true', 'data'=>$user));
    }

    protected function update(Request $request)
    {
        try{
            // INITIALIZATION
            $input = $request->all();
    
            // CREATE USER
            $user = User::find($input['id']);
            $user->email = $input['email'];
            $user->user_access = $input['accessType'];
            $user->user_position = $input['positionTitle'];
            if(isset($input['image'])){
                $user->image_id =   $input['image'];
            }
            $user->save();
    
            return Response::json(array('result'=>'true', 'message'=>'Succefully UPDATED!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'false', $e));
        }
        
    }

    protected function activate($id)
    {
        try{
            $user = User::find($id);
            $user->isActive = 1;
            $user->save();
            return Response::json(array('result'=>'true', 'message'=>'User Succesfully Activated!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }   

    protected function deActivate($id)
    {
        try{
            $user = User::find($id);
            $user->isActive = 0;
            $user->save();
            return Response::json(array('result'=>'true', 'message'=>'User Succesfully Deactivated!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }   

    protected function delete($id)
    {
        try{
            $user = User::find($id);
            $user->delete();
            return Response::json(array('result'=>'true', 'message'=>'User Succesfully Deleted!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }  

    // VALIDATION
    protected function validateEmail(Request $request) {
        $input = $request->all();

        $user = User::where('email',$input['email'])->get();
        if ($user->isEmpty()){
            return 'true';
        }else{
            return 'false';
        }
    }
}
