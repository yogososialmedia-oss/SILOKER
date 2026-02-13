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
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => App\Http\Middleware\isAdmin::class,
            'isPerusahaanMitra' => App\Http\Middleware\isPerusahaanMitra::class,
            'isPencariKerja' => App\Http\Middleware\isPencariKerja::class,
            'guestAdmin' => App\Http\Middleware\guestAdmin::class,
            'guestPerusahaanMitra' => App\Http\Middleware\guestPerusahaanMitra::class,
            'guestPencariKerja' => App\Http\Middleware\guestPencariKerja::class,
            'authAny' => App\Http\Middleware\authAny::class,
            'verified.perusahaan' => App\Http\Middleware\CheckPerusahaanVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
