<?php

namespace App\Components\Auth\Contracts\Repositories;

interface AuthRepository
{
	public function authenticate(string $email, string $password);

	public function refresh();

	public function logout();
}
