<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubjectContract;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Hash;

class User extends Base implements AuthenticatableContract, AuthorizableContract, JWTSubjectContract
{
    use Authenticatable, Authorizable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'date_of_birth'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getIsVerifiedAttribute()
    {
        return (bool)$this->email_verified_at;
    }
}
