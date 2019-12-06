<?php

namespace App\Components\Auth\Repositories;

use App\Components\Auth\Contracts\Repositories\PasswordRepository;
use App\Components\Base\Traits\HandleSigning;

use App\Components\User\Contracts\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;

class MailPasswordRepository implements PasswordRepository
{
    use HandleSigning;

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function send(string $email)
    {
        $user = $this->repository->showByEmail($email);

        $expiry = $this->getExpiry();

        $payload = $this->createPayload($user, $expiry);

        $signature = $this->createSignature($payload);

        Mail::to($user->email)
            ->send(new ResetPasswordEmail($user->first_name, $user->email, $expiry, $signature));

        return true;
    }

    public function reset(string $email, int $expiry, string $signature, string $password)
    {
        $user = $this->repository->showByEmail($email);

        $this->checkExpiry($expiry);

        $payload = $this->createPayload($user, $expiry);

        $this->checkSignature($signature, $payload);

        $this->repository->updatePassword($user->id);

        return true;
    }

    private function createPayload(User $user, int $expiry)
    {
        return [
            $user->password,
            $user->email,
            $expiry
        ];
    }

}
