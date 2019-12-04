<?php

namespace App\Components\User\Repositories;

use App\Components\Base\Repositories\EloquentBaseRepository;
use App\Components\User\Contracts\Repositories\UserRepository;

use App\Libraries\Signing;
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

    public function verify(string $email)
    {
        $user = $this->model::where('email', $email)->firstOrFail();

        if($user->is_verified)
        {
            throw new VerificationException(403, 'This User is already verified.');
        }

        $user->email_verified_at = Carbon::now();
        $user->save();

        return true;
    }

    public function isVerified(int $id)
    {
        $model = $this->loadModel($id);

        return $model->is_verified;
    }

    public function sendVerification(string $email)
    {
        $user = $this->model::where('email', $email)->firstOrFail();

        $expiry = Carbon::now()->addHours(24)->timestamp;

        $signature = Signing::signArray([
            $user->email,
            $expiry
        ]);

        Mail::to($user->email)
            ->send(new VerificationEmail($user->first_name, $user->email, $expiry, $signature));

        return true;
    }
}
