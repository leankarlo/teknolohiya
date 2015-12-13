<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class ArticleTag extends Model
{

    protected $table = 'article_tags';

    public function Article()
    {
        return $this->belongsTo('App\Models\Article','id','article_id');
    }

    public function ArticleType()
    {
    	return $this->hasMany('App\Models\ArticleType','id','article_types_id');
    }

}
