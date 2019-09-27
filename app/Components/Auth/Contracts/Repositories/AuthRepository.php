<?php

namespace App\Components\Auth\Contracts\Repositories;

use App\Models\User;

interface AuthRepository
{
	public function __construct(User $model);

	public function authenticate(string $email, string $password);

	public function logout();
}
