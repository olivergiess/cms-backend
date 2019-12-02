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
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

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

    public function verify(int $id, string $token)
    {
        $user = $this->loadModel($id);

        if(!$user->validateToken($token))
        {
            throw new VerificationException(400, 'Invalid verification token.');
        }

        if($user->is_verified)
        {
            throw new VerificationException(400, 'This User is already verified.');
        }

        $user->email_verified_at = Carbon::now();
        $user->save();

        $result = $this->resource->make($user);

        return $result;
    }

    public function isVerified(int $id)
    {
        $model = $this->loadModel($id);

        return $model->is_verified;
    }

    public function sendVerificationToken(int $id)
    {
        $user = $this->loadModel($id);

        $token = $user->createToken();

        Mail::to($user->email)
            ->send(new VerificationEmail($user, $token));

        return true;
    }
}
