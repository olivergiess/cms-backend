<?php

namespace App\Components\Auth\Http\Controllers;

use App\Components\Base\Http\Controllers\BaseController;

use App\Components\Auth\Contracts\Repositories\VerificationRepository;
use App\Components\Auth\Http\Requests\VerificationSendRequest;
use App\Components\Auth\Http\Requests\VerificationVerifyRequest;

class VerificationController extends BaseController
{
	protected $repository;

	public function __construct(VerificationRepository $repository)
	{
		$this->repository = $repository;
	}

    public function send(VerificationSendRequest $request)
    {
        $email = $request->email;

        $this->repository->send($email);

        return response()->json([])->status(204);
    }

    public function verify(VerificationVerifyRequest $request)
    {
        $this->repository->verify($request->email, $request->expiry, $request->signature);

        return response()->json([])->status(204);
    }
}
