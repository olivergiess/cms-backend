<?php

namespace App\Components\User\Http\Resources;

use App\Components\Base\Http\Resources\BaseCollection;

class UserCollection extends BaseCollection
{
    public $collects = 'App\Components\User\Http\Resources\UserResource';
}
