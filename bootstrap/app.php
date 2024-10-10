<?php

use App\Http\Middleware\AdminLoginMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PostMiddleware;
use App\Http\Middleware\ProfileMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'ProfiletAuth' => ProfileMiddleware::class,
            'PostAuth' => PostMiddleware::class,
            'AdminAuth' => AdminMiddleware::class,
            'AdminLoginAuth' => AdminLoginMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
