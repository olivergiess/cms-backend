<?php

namespace App\Components\User\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use Illuminate\Http\Request;
use App\Components\User\Contracts\Repositories\UserRepository;
use App\Components\User\Http\Requests\UserStoreRequest;
use App\Components\User\Http\Requests\UserVerifyRequest;

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

    public function verify(UserVerifyRequest $request)
    {
        $data = $request->validated();

        $result = $this->repository->verify($data['email'], $data['expiry']);

        return $result;
    }
}
