<?php

namespace App\Listeners;

use App\Components\Auth\Contracts\Repositories\VerificationRepository;
use App\Events\UserRegistered;

class SendVerificationNotification
{
    protected $repository;

    public function __construct(VerificationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(UserRegistered $event)
    {
        $user = $event->user;

        $this->repository->send($user->email);
    }
}
