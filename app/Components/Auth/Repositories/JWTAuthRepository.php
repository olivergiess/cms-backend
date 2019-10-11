<?php

namespace App\Components\Auth\Repositories;

use App\Components\Auth\Contracts\Repositories\AuthRepository;

use App\Models\User;
use App\Components\Auth\Http\Resources\TokenResource;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class JWTAuthRepository implements AuthRepository
{
	protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function authenticate(string $email, string $password)
	{
	    $token = auth()->attempt(['email' => $email, 'password' => $password]);

		if (!$token)
		{
            throw new UnauthorizedHttpException('', 'Unable to Authenticate.');
        }

		return TokenResource::make($token);
	}

	public function refresh()
    {
        $token = auth()->refresh();

        return TokenResource::make($token);
    }

	public function logout()
    {
        auth()->logout();
    }
}
