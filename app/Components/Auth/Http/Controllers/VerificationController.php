<?php

namespace App\Components\Auth\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Components\Auth\Http\Requests\VerificationSendRequest;
use App\Components\Auth\Http\Requests\VerificationVerifyRequest;

class VerificationController extends BaseController
{
	protected $repository;

	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}

    public function send(VerificationSendRequest $request)
    {
        $email = $request->email;

        $this->repository->sendVerification($email);

        return response()->json([])->status(204);
    }

    public function verify(VerificationVerifyRequest $request)
    {
        $data = $request->validated();

        $this->repository->verify($data['email'], $data['expiry']);

        return response()->status(204);
    }
}
