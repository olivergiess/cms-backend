<?php

namespace App\Components\User\Contracts\Repositories;

use App\Components\Base\Contracts\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
	public function authenticated(array $where);

	public function getBySlug(string $slug);

	public function withPublished();
}
