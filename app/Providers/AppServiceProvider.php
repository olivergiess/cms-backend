<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->app->bind('App\Components\Post\Contracts\Repositories\PostRepository', \App\Components\Post\Repositories\EloquentPostRepository::class);
        $this->app->bind('App\Components\User\Contracts\Repositories\UserRepository', \App\Components\User\Repositories\EloquentUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
