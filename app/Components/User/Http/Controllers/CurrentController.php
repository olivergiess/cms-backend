<?php

namespace App\Components\User\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use Illuminate\Http\Request;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Components\User\Http\Requests\CurrentUpdateRequest;

class CurrentController extends BaseController
{
    protected $allowedExpansions = [
        'blogs.posts'
    ];

    public function __construct(Request $request, UserRepository $repository)
    {
        $this->repository = $repository;

        parent::__construct($request);
    }

    public function show()
    {
        return $this->repository->showAuthenticated();
    }

    public function update(CurrentUpdateRequest $request)
    {
        $data = $request->validated();

        $user = $this->repository->showAuthenticated();

        return $this->repository->update($user->id, $data);
    }
}
