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

}
