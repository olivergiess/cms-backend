<?php

namespace App\Components\User\Contracts\Repositories;

use App\Components\Base\Contracts\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
	public function showAuthenticated(array $where);

	public function showByEmail(string $email);

	public function updatePassword(int $id, string $password);
}
