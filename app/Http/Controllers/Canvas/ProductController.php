<?php

namespace App\Http\Controllers\Canvas;

use App\Models\Product;
use App\Models\ProductCategoryDetail;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductCategoryLevel;
use App\Models\ImageColor;
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
        $products = Product::with(['image'])
        ->get();
        return Response::json(array('result' => 'true', 'message' => 'successfull', 'data' => $products ));
    }

    protected function GetProduct($id){
        $product = Product::with(['image'])->get()->find($id);
        return Response::json(array('result' => 'true', 'message' => 'successfull', 'data' => $product ));
    }

    protected function Create(Request $request){
        // INITIALIZATION
        $input = $request->all();

        try{
            $product = new Product;
            $product->name              = $input['product_name'];
            $product->description       = $input['product_description'];
            $product->price             = $input['product_price'];
            $product->primary_image     = $input['image'];
            $product->save();

            return Response::json(array('result' => 'true', 'message' => 'successfull','id' => $product->id ));

        }catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => $e ));
        }
    }

    protected function Update(Request $request){
        
        // INITIALIZATION
        $input = $request->all();

        try{

            $product                    = Product::find($input['product_id']);
            $product->name              = $input['product_name'];
            $product->description       = $input['product_description'];
            $product->price             = $input['product_price'];
    
            if($input['image'] != '' || $input['image'] != null){
                $product->primary_image = $input['image'];
            }
            
            $product->save();
            return Response::json(array('result' => 'true', 'message' => 'successfull','id' => $product->id ));

        }catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => $e ));
        }
        
    }

    protected function GetProductCategory($id){

        $productCategories = ProductCategoryDetail::with(['product'])->with('productCategory')
        ->where('product_id',$id)
        ->get();
        if($productCategories){
            return Response::json(array('result' => 'true', 'message' => 'successfull', 'data' => $productCategories ));
        }else{
            return Response::json(array('result' => 'false', 'message' => 'no data' ));
        }
        
    }

    protected function GetProductCategoryLevel(){

        $productCategories = ProductCategoryLevel::with('ProductCategory')->orderBy('position')->get();

        if($productCategories){
            return Response::json(array('result' => 'true', 'message' => 'successfull', 'data' => $productCategories ));
        }else{
            return Response::json(array('result' => 'false', 'message' => 'no data' ));
        }
        
    }

    public function UpdateLevel(Request $request){
        
        // INITIALIZATION
        $input = $request->all();
        try{
            $isParent = 0;
            $categoryMenu = ProductCategoryLevel::find($input['child']);
            $categoryMenu->parent_id = $input['parent'];

            if($input['parent'] != 0)
            {
                $isParent = 1;
            }

            $categoryMenu->isParent = 0;
            $categoryMenu->position = $input['position'];
            $categoryMenu->save();

            if($input['parent'] != 0)
            {
                $parent = ProductCategoryLevel::find($input['parent']);
                $parent->isParent = 1;
                $parent->save();
            }
            

            return Response::json(array('result'=>'Success', 'message'=>'Category Menu has been Updated'));
        }
        catch(Exception $e)
        {
            return Response::json(array('result'=>'Failed', 'message'=>$e));
        }
        
    }

    public function DeleteCategoryLevel($id){
        try{
            $categoryMenu = ProductCategoryLevel::find($id);
            if($categoryMenu->isParent == 1){
                return Response::json(array('result'=>'Failed', 'message'=>'Category must not have child level!!</br>REMOVE CHILD FIRST!!!'));
            }else{
                $categoryMenu->delete();
                return Response::json(array('result'=>'Success', 'message'=>'Category was removed!'));
            }
        }
        catch(Exception $e)
        {
            return Response::json(array('result'=>'Failed', 'message'=>$e));
        }
    }

    public function AddCategoryLevel($id){

        try{
            $categoryMenu = new ProductCategoryLevel();
            $categoryMenu->category_id = $id;
            $categoryMenu->save();
            return Response::json(array('result'=>'Success', 'message'=>'New Category Menu has been added'));
        }
        catch(Exception $e)
        {
            return Response::json(array('result'=>'Failed', 'message'=>$e));
        }
    }

    protected function LoadCategorySelection(){
        $categories = ProductCategory::all();
        if($categories){
            return Response::json(array('result' => 'true', 'message' => 'successfull', 'data' => $categories ));
        }else{
            return Response::json(array('result' => 'false', 'message' => 'no data' ));
        }
    }

    protected function DeleteProductCategory($id){
        try{
            $productCategoryDetail = ProductCategoryDetail::find($id);
            $productCategoryDetail->delete();

            return Response::json(array('result' => 'true', 'message' => 'Successfully deleted.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on deleting category.', 'data' => $e ));
        }
    }

    protected function AddProductCategory($id, $product_id){
        try{
            $productCategoryDetail = new ProductCategoryDetail;
            $productCategoryDetail->category_id = $id;
            $productCategoryDetail->product_id = $product_id;
            $productCategoryDetail->save();

            return Response::json(array('result' => 'true', 'message' => 'Successfully deleted.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on deleting category.', 'data' => $e ));
        }
    }

    protected function CreateNewCategory($name){
        try{
            $productCategory = new ProductCategory;
            $productCategory->name = $name;
            $productCategory->save();

            return Response::json(array('result' => 'true', 'message' => 'Successfully deleted.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on deleting category.', 'data' => $e ));
        }
    }

    protected function GetProductImage($id){
        $productCategories = ProductImage::with('image')->with('imageColor')->where('product_id',$id)
        ->get();
        if($productCategories){
            return Response::json(array('result' => 'true', 'message' => 'successfull', 'data' => $productCategories ));
        }else{
            return Response::json(array('result' => 'false', 'message' => 'no data' ));
        }
    }

    protected function LoadColorSelection(){
        $imageColor = ImageColor::all();
        if($imageColor){
            return Response::json(array('result' => 'true', 'message' => 'successfull', 'data' => $imageColor ));
        }else{
            return Response::json(array('result' => 'false', 'message' => 'no data' ));
        }
    }

    protected function DeleteProductImage($id){
        try{
            $productImage = ProductImage::find($id);
            $productImage->delete();

            return Response::json(array('result' => 'true', 'message' => 'Successfully deleted.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on deleting category.', 'data' => $e ));
        }
        
    }

    protected function SaveProductImageColor($id, $color_id){
        try{
            $imageColor = ProductImage::find($id);
            $imageColor->color_id = $color_id;
            $imageColor->save();


            return Response::json(array('result' => 'true', 'message' => 'Successfully deleted.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on deleting category.', 'data' => $e ));
        }
    }

    protected function SaveProductImage($id, $product_id){
        try{
            $image = new ProductImage;
            $image->image_id = $id;
            $image->product_id = $product_id;
            $image->save();


            return Response::json(array('result' => 'true', 'message' => 'Successfully deleted.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on deleting category.', 'data' => $e ));
        }
    }

    protected function DeleteProduct($id){
        try{
            $productCategoryDetail = ProductCategoryDetail::where('product_id',$id)->delete();

            $productImage = ProductImage::where('product_id',$id)->delete();

            $product = Product::find($id);
            $product->delete();

            return Response::json(array('result' => 'true', 'message' => 'Successfully deleted.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on deleting category.', 'data' => $e ));
        }
    }

    protected function UnPublishProduct($id){
        try{

            $product = Product::find($id);
            $product->isPublished = 0;
            $product->save();

            return Response::json(array('result' => 'true', 'message' => 'Successfully Updated.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on updating product.', 'data' => $e ));
        }
    }

    protected function PublishProduct($id){
        try{

            $product = Product::find($id);
            $product->isPublished = 1;
            $product->save();

            return Response::json(array('result' => 'true', 'message' => 'Successfully Updated.' ));
        }
        catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => 'Error on updating product.', 'data' => $e ));
        }
    }

}
