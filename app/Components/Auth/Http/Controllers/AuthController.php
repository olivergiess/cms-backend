<?php

namespace App\Components\Auth\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Auth\Contracts\Repositories\AuthRepository;
use App\Components\Auth\Http\Requests\LoginRequest;

class AuthController extends BaseController
{
	protected $user;

	public function __construct(AuthRepository $user)
	{
		$this->user = $user;
	}

    public function login(LoginRequest $request)
	{
		$token = $this->user->authenticate($request->email, $request->password);

		return $token;
	}

	public function logout()
	{
	    $this->user->logout();
	}
}
