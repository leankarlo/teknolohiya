<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Article extends Model
{

    protected $table = 'articles';

    public function Tags()
    {
        return $this->hasOne('App\Models\ArticleTag','article_id','id');
    }

    public function Featured_image()
    {
        return $this->hasOne('App\Models\Image','id','featured_image');
    }

    public function Author()
    {
        return $this->hasOne('App\Models\User','id','author');
    }

}
