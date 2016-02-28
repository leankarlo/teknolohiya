<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class ImageColor extends Model
{

    protected $table = 'image_colors';

    // Relationship between Images and Product Image Colors
	public function productImages()
	{
		return $this->hasMany('App\Models\ProductImage', 'color_id');
	}

	public function productColor()
	{
		return $this->belongsTo('App\Models\ProductImage','color_id');
	}
}
