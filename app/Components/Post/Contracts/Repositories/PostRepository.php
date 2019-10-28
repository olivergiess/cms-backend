<?php

namespace App\Components\Post\Contracts\Repositories;

use App\Components\Base\Contracts\Repositories\BaseRepository;

interface PostRepository extends BaseRepository
{
    public function allPublished();

    public function showPublished(int $id);
}
