<?php

namespace App\Components\User\Contracts\Repositories;

use App\Components\Base\Contracts\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
	public function authenticated(array $where);

	public function verify(int $id, string $token);

	public function verified(int $id);

	public function verificationToken(int $id);
}
