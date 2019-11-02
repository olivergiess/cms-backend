<?php

namespace App\Components\User\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Components\User\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(Request $request, UserRepository $repository)
    {
        $this->repository = $repository;

        parent::__construct($request);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();

        return $this->repository->create($data);
    }
}
