<?php

namespace App\Middleware;

use Illuminate\Http\Request;
use Closure;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Exceptions\VerificationException;

class UserIsVerified
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    	$user = $this->repository->showAuthenticated();

    	if(!$this->repository->isVerified($user->id))
        {
            throw new VerificationException(403, 'Your email address is not verified.');
        }

    	return $next($request);
    }
}
