<?php

namespace App\Listeners;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

class SendVerificationNotification
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(UserRegistered $event)
    {
        $user = $event->user;

        $token = $this->repository->verificationToken($user->id);

        Mail::to($user->email)
            ->send(new VerificationEmail($user, $token));
    }
}
