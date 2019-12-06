<?php

namespace App\Components\Auth\Repositories;

use App\Components\Auth\Contracts\Repositories\VerificationRepository;
use App\Components\Base\Traits\HandleSigning;

use App\Components\User\Contracts\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use App\Exceptions\VerificationException;
use App\Components\User\Http\Resources\UserResource;
use Carbon\Carbon;

class MailVerificationRepository implements VerificationRepository
{
    use HandleSigning;

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function send(string $email) : bool
    {
        $user = $this->repository->showByEmail($email);

        $expiry = $this->getExpiry();

        $payload = $this->createPayload($user, $expiry);

        $signature = $this->createSignature($payload);

        Mail::to('oliver.giess.93@gmail.com')
            ->send(new VerificationEmail($user->first_name, $user->email, $expiry, $signature));

        return true;
    }

    public function verify(string $email, int $expiry, string $signature) : bool
    {
        $user = $this->repository->showByEmail($email);

        $this->checkExpiry($expiry);

        $payload = $this->createPayload($user, $expiry);

        $this->checkSignature($signature, $payload);

        if($user->is_verified)
        {
            throw new VerificationException(403, 'This User is already verified.');
        }

        $this->repository->update($user->id, [
            'email_verified_at' => Carbon::now()
        ]);

        return true;
    }

    private function createPayload(UserResource $user, int $expiry)
    {
        return [
            $user->email,
            $expiry
        ];
    }
}
