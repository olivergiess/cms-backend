<?php

namespace App\Components\Auth\Contracts\Repositories;

interface PasswordRepository
{
	public function send(string $email);

	public function reset(string $email, int $expiry, string $signature, string $password);
}
