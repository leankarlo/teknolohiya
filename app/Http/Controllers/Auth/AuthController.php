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
use Illuminate\Foundation\Auth\ThrottlesLogins;
// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a user auth after a valid login.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        // INITIALIZATION
        $input = $request->all();
        //SET RULES FOR VALIDATION
        $rules = array( 'email'  => 'required', 
                        'password'  => 'required' );

        // VALIDATE
        $valid = Validator::make($input,$rules);

        // CHECK VALIDATE RESULT
        if ($valid->fails()) 
        {
            // IF FAIL RETURN TO LOGIN
            return redirect('/login')->with(array('result' => false, 'message' => 'Incomplete Email or Password'));
        }
        else 
        {
            // PARAMETERS FOR AUTHENTICATION
            $userdata = array(
                'email'     => $input['email'],
                'password'  => $input['password'],
            );

            // AUTHENTICATE USER
            if (Auth::attempt($userdata) == true) 
            {
                //CHECK IF USER CONFIRMED VIA EMAIL
                if(Auth::user()->isActive  == 1)
                {
                    //REDICT TO DASHBOARD
                    return Redirect::to('/canvas');
                }
                else 
                {
                    //if not active
                    Auth::logout();
                    return Redirect::to('/login')->with(array('result' => false, 'message' => 'User not activated'));
                }
            }
            else{
                Auth::logout();
                return redirect('/login')->with(array('result' => false, 'message' => 'Incorrect Email or Password'));
            }
        }
    }

    /**
     * destroy a user auth
     *
     * @param  array  $data
     * @return User
     */
    protected function destroy(){
        // Auth::logout();
        // return Response::json(array('logout'=>'out'));
        // return redirect($redirectAfterLogout);
        // return Redirect::to('/login');
        // die('test');
        Auth::logout();
        return redirect('/login');
    }
}
