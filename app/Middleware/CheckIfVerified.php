<?php

namespace App\Middleware;

use Illuminate\Http\Request;
use Closure;

use App\Components\User\Contracts\Repositories\UserRepository;
use App\Exceptions\VerificationException;

class CheckIfVerified
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

    	if(!$user->is_verified)
        {
            throw new VerificationException(403, 'Your email address is not verified.');
        }

    	return $next($request);
    }
}
