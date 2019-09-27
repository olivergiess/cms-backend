<?php

namespace App\Components\User\Repositories;

use App\Components\Base\Repositories\EloquentBaseRepository;
use App\Components\User\Contracts\Repositories\UserRepository;

use App\Models\User;
use App\Components\User\Http\Resources\UserResource;
use App\Components\User\Http\Resources\UserCollection;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    public function __construct(User $model, UserResource $resource, UserCollection $collection)
    {
        parent::__construct($model, $resource, $collection);
    }

    public function authenticated(array $where = [])
    {
        $user = auth()->user();

		$result = $this->resource->make($user);

		return $result;
    }
}
