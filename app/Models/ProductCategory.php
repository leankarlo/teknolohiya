<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class ProductCategory extends Model
{

    protected $table = 'product_categories';

    // Relationship between Product Category and Products Category List
    public function categoryMenu()
    {
        return $this->hasOne('App\Models\CategoryMenu', 'category_id');
    }

}
