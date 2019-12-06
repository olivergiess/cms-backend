<?php

namespace App\Components\User\Repositories;

use App\Components\Base\Repositories\EloquentBaseRepository;
use App\Components\User\Contracts\Repositories\UserRepository;

use App\Models\User;
use App\Components\User\Http\Resources\UserResource;
use App\Components\User\Http\Resources\UserCollection;

use Illuminate\Support\Facades\Hash;
use App\Events\UserRegistered;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    public function __construct(User $model, UserResource $resource, UserCollection $collection)
    {
        parent::__construct($model, $resource, $collection);
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);

        $result = parent::create($data);

        event(new UserRegistered($result));

        return $result;
    }

    public function showAuthenticated(array $where = [])
    {
        $user = auth()->user();

        $user->load($this->getExpansions());

        $result = $this->resource->make($user);

        return $result;
    }

    public function showByEmail(string $email)
    {
        $user = $this->loadModel($email, 'email');

        $result = $this->resource->make($user);

        return $result;
    }

    public function updatePassword(int $id, string $password)
    {
        $user = $this->loadModel($id);

        $user->password = $password;
        $user->save();

        $result = $this->resource->make($user);

        return $result;
    }
}
