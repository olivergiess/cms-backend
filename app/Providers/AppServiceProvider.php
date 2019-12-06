<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Validator;
use App\Rules\Own;
use App\Rules\VerifySignature;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Components\Auth\Contracts\Repositories\AuthRepository', \App\Components\Auth\Repositories\JWTAuthRepository::class);
        $this->app->bind('App\Components\Auth\Contracts\Repositories\VerificationRepository', \App\Components\Auth\Repositories\MailVerificationRepository::class);
        $this->app->bind('App\Components\Auth\Contracts\Repositories\PasswordRepository', \App\Components\Auth\Repositories\MailPasswordRepository::class);
        $this->app->bind('App\Components\User\Contracts\Repositories\UserRepository', \App\Components\User\Repositories\EloquentUserRepository::class);
        $this->app->bind('App\Components\Blog\Contracts\Repositories\BlogRepository', \App\Components\Blog\Repositories\EloquentBlogRepository::class);
        $this->app->bind('App\Components\Post\Contracts\Repositories\PostRepository', \App\Components\Post\Repositories\EloquentPostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('own', function ($attribute, $value, $parameters, $validator) {
            $can = new Own($parameters[0]);

            return $can->passes($attribute, $value);
        });
    }
}
