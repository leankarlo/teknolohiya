<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Image extends Model
{

    protected $table = 'images';

    // Relationship between Images and Product Images
	public function productImages()
	{
		return $this->belongTo('App\Models\ProductImage', 'image_id');
	}

	public function sliderImages(){
		return $this->belongsTo('App\Models\Slider','image_id');
	}

	public function promoImages(){
		return $this->belongsTo('App\Models\Promo','image_id');
	}

}
