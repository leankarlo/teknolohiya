<?php

namespace App\Http\Controllers\Canvas;

use App\Models\Contact;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        return Response::json(array('data' => Contact::all()  )) ;
    }

    public function getContact($id){
        $contact = Contact::find($id);
        return Response::json($contact);
    }

    public function create(Request $request){
        $input = $request->all();
        try{
            
            $store = new Contact;
            $store->name        = $input['name'];
            $store->address1    = $input['address1'];
            $store->address2    = $input['address2'];
            $store->address3    = $input['address3'];
            $store->address4    = $input['address4'];
            $store->address5    = $input['address5'];
            $store->country     = $input['country'];
            $store->zipcode     = $input['zipcode'];
            $store->mobile1     = $input['mobile1'];
            $store->mobile2     = $input['mobile2'];
            $store->mobile3     = $input['mobile3'];
            $store->landline1   = $input['landline1'];
            $store->landline2   = $input['landline2'];
            $store->landline3   = $input['landline3'];
            $store->fax1        = $input['fax1'];
            $store->fax2        = $input['fax2'];
            $store->fax3        = $input['fax3'];
            $store->email1      = $input['email1'];
            $store->email2      = $input['email2'];
            $store->email3      = $input['email3'];
            $store->long        = $input['long'];   
            $store->lat         = $input['lat'];
    
            $store->save();

            return Redirect::to('canvas/pages/contact');

        }catch(Exception $e){

            return Response::json(array('result'=>'false','message'=>'Server Error'));

        }
        
    }

    public function update(Request $request){
        $input = $request->all();
        try{
            
            $store              = Contact::find($input['edit_id']);
            $store->name        = $input['edit_name'];
            $store->address1    = $input['edit_address1'];
            $store->address2    = $input['edit_address2'];
            $store->address3    = $input['edit_address3'];
            $store->address4    = $input['edit_address4'];
            $store->address5    = $input['edit_address5'];
            $store->country     = $input['edit_country'];
            $store->zipcode     = $input['edit_zipcode'];
            $store->mobile1     = $input['edit_mobile1'];
            $store->mobile2     = $input['edit_mobile2'];
            $store->mobile3     = $input['edit_mobile3'];
            $store->landline1   = $input['edit_landline1'];
            $store->landline2   = $input['edit_landline2'];
            $store->landline3   = $input['edit_landline3'];
            $store->fax1        = $input['edit_fax1'];
            $store->fax2        = $input['edit_fax2'];
            $store->fax3        = $input['edit_fax3'];
            $store->email1      = $input['edit_email1'];
            $store->email2      = $input['edit_email2'];
            $store->email3      = $input['edit_email3'];
            $store->long        = $input['edit_long'];   
            $store->lat         = $input['edit_lat'];
    
            $store->save();

            return Redirect::to('canvas/pages/contact');

        }catch(Exception $e){

            return Response::json(array('result'=>'false','message'=>'Server Error'));

        }
        
    }

    public function delete($id){
        try{
            $store = Contact::find($id);
            $store->delete();

            return Response::json(array('result'=>'true','message'=>'Contact Succesfully Deleted'));
        }catch(Exception $e){
            return Response::json(array('result'=>'false','message'=>'Server Error'));
        }
    }

    protected function activate($id)
    {
        try{
            $store = Contact::find($id);
            $store->isPublished = 1;
            $store->save();
            return Response::json(array('result'=>'true', 'message'=>'Contact Succesfully Published!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }   

    protected function deActivate($id)
    {
        try{
            $store = Contact::find($id);
            $store->isPublished = 0;
            $store->save();
            return Response::json(array('result'=>'true', 'message'=>'Contact Succesfully Unpublished!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }  

}
