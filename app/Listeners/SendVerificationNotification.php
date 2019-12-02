<?php

namespace App\Listeners;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Events\UserRegistered;

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

        $this->repository->sendVerificationToken($user->id);
    }
}
