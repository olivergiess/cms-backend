<?php

namespace App\Components\User\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\User\Contracts\Repositories\UserRepository;

class SlugController extends BaseController
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show(string $slug)
    {
        return $this->repository->getBySlug($slug);
    }
}
