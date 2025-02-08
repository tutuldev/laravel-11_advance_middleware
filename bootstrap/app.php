<?php

use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;
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
            'IsUserValid' => ValidUser::class,
            'Test' => TestUser::class,
        ]);
        // $middleware->appendToGroup('ok-user',[
        //     ValidUser::class,
        //     TestUser::class,
        // ]);
        $middleware->prependToGroup('ok-user',[
            ValidUser::class,
            TestUser::class,
        ]);
        // prependToGroup // appendToGroup same  kaj kore 
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
