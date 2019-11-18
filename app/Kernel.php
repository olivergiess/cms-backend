<?php

namespace App;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Middleware\TrustProxies::class,
        \App\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'api' => [
            'json',
            'cors',
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'cors' => \Barryvdh\Cors\HandleCors::class,
        'json' => \App\Http\Middleware\JsonAcceptHeader::class,
        'test' => \App\Middleware\Testing::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \App\Http\Middleware\JsonAcceptHeader::class,
        \Barryvdh\Cors\HandleCors::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Auth\Middleware\Authenticate::class,
    ];
}
