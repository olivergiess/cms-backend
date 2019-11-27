<?php

namespace App\Middleware;

use App\Components\User\Contracts\Repositories\UserRepository;
use Closure;
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
    public function handle($request, Closure $next)
    {
    	$user = $request->user();

    	if(!$this->repository->verified($user->id))
        {
            throw new VerificationException(403, 'Your email address is not verified.');
        }

    	return $next($request);
    }
}
