<?php

namespace App\Components\Blog\Contracts\Repositories;

use App\Components\Base\Contracts\Repositories\BaseRepository;

interface BlogRepository extends BaseRepository
{
    public function getByURLIdentifier(string $url_identifier);
}
