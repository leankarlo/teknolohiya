<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class ProductImage extends Model
{

    protected $table = 'product_images';

    public function image()
	{
		return $this->hasOne('Image', 'id','image_id');
	}

	public function color()
	{
		return $this->belongsTo('ImageColor', 'color_id');
	}

	public function imageColor()
	{
		return $this->hasOne('ImageColor', 'id','color_id');
	}

	public function product(){
		return $this->belongsTo('Product','id','product_id');
	}

}
