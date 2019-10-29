<?php

namespace App\Components\User\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Components\User\Http\Requests\UserStoreRequest;

class UserController extends BaseController
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();

        return $this->repository->create($data);
    }
}
