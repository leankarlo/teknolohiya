<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class ProjectTag extends Model
{

    protected $table = 'project_tags';

    public function Project()
    {
        return $this->belongsTo('App\Models\Project','id','project_id');
    }

    public function ProjectType()
    {
    	return $this->hasMany('App\Models\ProjectType','id','project_types_id');
    }

}
