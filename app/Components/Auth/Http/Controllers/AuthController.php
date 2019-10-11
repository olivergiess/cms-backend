<?php

namespace App\Components\Auth\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Auth\Contracts\Repositories\AuthRepository;
use App\Components\Auth\Http\Requests\LoginRequest;

class AuthController extends BaseController
{
	protected $repository;

	public function __construct(AuthRepository $repository)
	{
		$this->repository = $repository;
	}

    public function login(LoginRequest $request)
	{
		$result = $this->repository->authenticate($request->email, $request->password);

		return $result;
	}

	public function refresh()
	{
		$result = $this->repository->refresh();

		return $result;
	}

	public function logout()
	{
	    $this->repository->logout();
	}
}
