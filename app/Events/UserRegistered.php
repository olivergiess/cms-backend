<?php

namespace App\Events;

use App\Components\User\Http\Resources\UserResource;

class UserRegistered
{
    public $user;

    public function __construct(UserResource $user)
    {
        $this->user = $user;
    }
}
