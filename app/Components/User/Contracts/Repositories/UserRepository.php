<?php

namespace App\Components\User\Contracts\Repositories;

use App\Components\Base\Contracts\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
	public function showAuthenticated(array $where);

	public function verify(string $email);

    public function isVerified(int $id);

	public function sendVerification(string $email);
}
