<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\ImageUploadMiddleware;
use App\Http\Middleware\EncryptCookies;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'auth' => Middleware::class,
        'role' => RoleMiddleware::class,
        'image.upload' => ImageUploadMiddleware::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            ShareErrorsFromSession::class,
            SubstituteBindings::class,
        ],
    ];
}
