<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubjectContract;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubjectContract
{
	use Authenticatable, Authorizable, SoftDeletes;

	protected $fillable = [
	    'first_name',
        'last_name',
	    'email',
        'password',
        'slug',
        'date_of_birth',
    ];

	public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
