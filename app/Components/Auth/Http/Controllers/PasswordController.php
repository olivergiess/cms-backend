<?php

namespace App\Components\Auth\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Auth\Contracts\Repositories\PasswordRepository;
use App\Components\Auth\Http\Requests\PasswordSendRequest;
use App\Components\Auth\Http\Requests\PasswordResetRequest;

class PasswordController extends BaseController
{
	protected $repository;

	public function __construct(PasswordRepository $repository)
	{
		$this->repository = $repository;
	}

	public function send(PasswordSendRequest $request)
	{
		$this->repository->send($request->email);

		return response()->json([])->status(204);
	}

    public function reset(PasswordResetRequest $request)
	{
		$this->repository->reset($request->email, $request->expiry, $request->signature, $request->password);

		return response()->json([])->status(204);
	}
}
