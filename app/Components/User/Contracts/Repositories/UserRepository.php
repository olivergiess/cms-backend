<?php

namespace App\Components\User\Contracts\Repositories;

use App\Components\Base\Contracts\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
	public function showAuthenticated(array $where);

	public function verify(int $id, string $token);

	public function sendVerificationToken(int $id);
}
