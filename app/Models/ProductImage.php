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
		return $this->hasOne('App\Models\Image', 'id','image_id');
	}

	public function color()
	{
		return $this->belongsTo('App\Models\ImageColor', 'color_id');
	}

	public function imageColor()
	{
		return $this->hasOne('App\Models\ImageColor', 'id','color_id');
	}

	public function product(){
		return $this->belongsTo('App\Models\Product','id','product_id');
	}

}
