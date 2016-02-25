<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Product extends Model
{

    protected $table = 'products';

    // Relationship between Products and Products Category
    public function productCategoryDetails()
    {
        return $this->hasMany('App\Models\ProductCategoryDetail', 'product_id');
    }

    // Relationship between Images and Product Images
    public function image()
    {
        return $this->hasOne('App\Models\Image','id', 'primary_image');
    }

    public function productImages(){
        return $this->hasMany('App\Models\ProductImage','product_id');
    }

}
