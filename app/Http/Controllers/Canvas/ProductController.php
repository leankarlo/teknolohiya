<?php

namespace App\Http\Controllers\Canvas;

use App\Models\Product;
use App\Models\ArticleType;
use App\Models\ArticleTag;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
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
    protected function ShowAll()
    {
        $products = Product::with(['productCategoryDetails.productCategory'])
        ->get();
        return Response::json(array('data' => $products));
    }

    protected function create(Request $request){
        // INITIALIZATION
        $input = $request->all();

        try{
            $product = new Product;
            $product->name              = $input['product_name'];
            $product->description       = $input['product_description'];
            $product->price             = $input['product_price'];
            $product->primary_image     = $input['image'];
            $product->save();

            return Response::json(array('result' => 'true', 'id' => $product->id ));

        }catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => $e ));
        }
    }

}
