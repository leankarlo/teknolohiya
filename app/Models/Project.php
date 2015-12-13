<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Project extends Model
{

    protected $table = 'projects';

    public function Tags()
    {
        return $this->hasOne('App\Models\ProjectTag','project_id','id');
    }

    public function Featured_image()
    {
        return $this->hasOne('App\Models\Image','id','featured_image');
    }

}
