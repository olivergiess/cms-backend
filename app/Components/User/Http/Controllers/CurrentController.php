<?php

namespace App\Components\User\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Components\User\Http\Requests\CurrentUpdateRequest;

class CurrentController extends BaseController
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show()
    {
        return $this->repository->authenticated();
    }

    public function update(CurrentUpdateRequest $request)
    {
        $data = $request->validated();

        $user = $this->repository->authenticated();

        return $this->repository->update($user->id, $data);
    }
}
