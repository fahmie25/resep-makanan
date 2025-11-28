<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    

    // Tambahkan middleware sesi & error
    ->withMiddleware(function (Middleware $middleware) {

    // GLOBAL middleware (Wajib!)
    $middleware->appendToGroup('web', [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
    ]);

    // Alias route middleware
    $middleware->alias([
        'auth'  => \Illuminate\Auth\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'admin' => \App\Http\Middleware\AdminOnly::class,
    ]);
})


    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
