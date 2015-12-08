<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use Mail;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function update(Requests $request){
        // INITIALIZATION
        $input = $request->all();
        try{
            $user = User::find($input['id']);
            $user->password = bcrypt($input['password']);
            $user->save();

            return Response::json(array('reuslt'=>'true', 'message'=>'Password Succcesfully Updated!'));
        }catch(Exception $e){
            return Response::json(array('reuslt'=>'false', 'message'=>$e.' Please Contact Admin!'));
        }
        
    }

    protected function validatePassword(Requests $request){
        $input = $request->all();

        $user = User::find($input['id']);
        if ($user->password == $input['old-password']){
            return 'true';
        }else{
            return 'false';
        }
    }
}
