<?php

namespace App\Components\User\Repositories;

use App\Components\Base\Repositories\EloquentBaseRepository;
use App\Components\User\Contracts\Repositories\UserRepository;

use App\Models\User;
use App\Components\User\Http\Resources\UserResource;
use App\Components\User\Http\Resources\UserCollection;

use Illuminate\Support\Facades\Hash;
use App\Events\UserRegistered;
use App\Exceptions\VerificationException;
use Carbon\Carbon;

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

    public function authenticated(array $where = [])
    {
        $user = auth()->user();

        $user->load($this->getExpansions());

        $result = $this->resource->make($user);

        return $result;
    }

    public function verify(int $id, string $token)
    {
        $user = $this->model->findOrFail($id);

        if($user->verified())
        {
            throw new VerificationException(400, 'This User is already verified.');
        }

        if(!$user->validateToken($token))
        {
            throw new VerificationException(400, 'Invalid verification token.');
        }

        $user->email_verified_at = Carbon::now();
        $user->save();

        $result = $this->resource->make($user);

        return $result;
    }

    public function verified(int $id)
    {
        $user = $this->model->findOrfail($id);

        return $user->verified();
    }

    public function verificationToken(int $id)
    {
        $user = $this->model->findOrfail($id);

        return $user->createToken();
    }
}
