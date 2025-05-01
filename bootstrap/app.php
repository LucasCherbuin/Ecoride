<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\ImageUploadMiddleware;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(RoleMiddleware::class);
        $middleware->append(ImageUploadMiddleware::class);
        $middleware->append(EncryptCookies::class);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
