<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class ProductCategoryLevel extends Model
{

    protected $table = 'product_category_levels';

    // Relationship between Images and Product Images
	public function productCategory()
	{
		return $this->belongsTo('App\Models\ProductCategory', 'category_id');
	}

}
