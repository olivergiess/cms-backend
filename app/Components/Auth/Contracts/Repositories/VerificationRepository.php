<?php

namespace App\Components\Auth\Contracts\Repositories;

interface VerificationRepository
{
    public function send(string $email) : bool;

	public function verify(string $email, int $expiry, string $signature) : bool;
}
