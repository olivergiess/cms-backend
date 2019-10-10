<?php

namespace App\Components\User\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;
use App\Http\Traits\Expandable;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Components\User\Http\Requests\CurrentUserUpdateRequest;

class CurrentUserController extends BaseController
{
    use Expandable;

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show()
    {
        return $this->repository->authenticated();
    }

    public function update(CurrentUserUpdateRequest $request)
    {
        $data = $request->validated();

        $user = $this->repository->authenticated();

        return $this->repository->update($user->id, $data);
    }
}
