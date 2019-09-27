<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Components';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapPublicRoutes();
        $this->mapProtectedRoutes();
    }

    /**
     * Define the "public" API routes for the application.
     *
     * These routes are stateless.
     *
     * @return void
     */
    protected function mapPublicRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api/public.php'));
    }

    /**
     * Define the "protected" API routes for the application.
     *
     * These routes are stateless.
     *
     * @return void
     */
    protected function mapProtectedRoutes()
    {
        Route::prefix('api')
             ->middleware(['api', 'auth:api'])
             ->namespace($this->namespace)
             ->group(base_path('routes/api/protected.php'));
    }
}
