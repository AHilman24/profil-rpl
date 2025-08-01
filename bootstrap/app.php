<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'login' => App\Http\Middleware\AuthMiddleware::class,
        ]);
        // $middleware->register('guest', App\Http\Middleware\GuestMiddleware::class);
        // $middleware->register('verified', App\Http\Middleware\EnsureEmailIsVerified::class);
        // $middleware->register('throttle', App\Http\Middleware\ThrottleRequests::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
