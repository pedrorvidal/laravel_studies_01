<?php

use App\Http\Middleware\EndMiddleware;
use App\Http\Middleware\StartMiddleware;
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
        // adicionar a todas as rotas ANTES
        // $middleware->prepend([
        //     StartMiddleware::class,
        //     // EndMiddleware::class,
        // ]);

        // adicionar a todas a rotas DEPOIS
        // $middleware->append([
        //     // StartMiddleware::class,
        //     EndMiddleware::class,
        // ]);

        // criar grupo de middlewares
        $middleware->prependToGroup('correr_antes',  [
            StartMiddleware::class,
        ]);

        $middleware->appendToGroup('correr_depois',  [
            EndMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
