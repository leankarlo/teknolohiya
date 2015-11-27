<?php

namespace App\Http\Controllers\Canvas;

use App\Models\Image;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
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
    |
    */


    /**
     * Get all the modules that is allowed to the current user
     *
     * @param  array  $data
     * @return Modules
     */
    protected function uploadImages(Request $request)
    {
        $file = $request->file;
        $pubpath = public_path();
        $destinationPath = $pubpath.'/uploads/images';


        $filename = $file->getClientOriginalName();

        $json['files'][] = array(
        'name' => $filename,
        'size' => $file->getSize(),
        'type' => $file->getMimeType(),
        'url' => '/uploads/images/'.$filename,
        'deleteType' => 'DELETE',
        // 'deleteUrl' => self::$route.'/deleteFile/'.$filename,
        );

        $upload = $file->move( $destinationPath, $filename );

        // $images = new Image(array(
        //     'filename'  =>  $filename,
        //     'url'           =>  '/uploads/images/' . $filename
        // ));

        $images = new Image;
        $images->filename   = $filename;
        $images->url        = '/uploads/images/' . $filename;
        $images->save();

        // $imageResult = $images->save();
        
    }

    protected function showAll()
    {
        return array('data'=>Image::all());
    }

    protected function deleteImage($id)
    {
        try
        {
            $image = Image::find($id);
            
            $path = $_SERVER['DOCUMENT_ROOT'].'uploads/images/'. $image->filename;
            unlink($path);

            
            $imageName = $image->filename;
            $image->delete();
            return Response::json(array('result' => 'Success', 'message' => $imageName . ' has been deleted.'));
        }
        catch(Exception $e)
        {
            return Response::json(array('result' => 'Failed', 'message' => 'Failed to delete '. $imageName . '/n Error: ' . $e));
        }
        
    }   
}
