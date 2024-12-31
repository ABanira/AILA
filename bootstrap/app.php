<?php

use App\Http\Middleware\Guestlogin;
use Illuminate\Foundation\Application;
use App\Http\Middleware\CheckUnitKerja;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    //Middleware Role yang aharus login terlebih dahulu
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'check.unit.kerja' => CheckUnitKerja::class,
            'guest' => Guestlogin::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
