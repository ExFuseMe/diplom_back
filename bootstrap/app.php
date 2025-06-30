<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->renderable(function (Exception $e) {
            $response = match (get_class($e)) {
                NotFoundHttpException::class => response()->json(['error' => __("Not Found")], 404),

                MethodNotAllowedHttpException::class => response()->json(['error' => __("Method Not Allowed")], 405),

                AccessDeniedHttpException::class => response()->json(['error' => __("Forbidden")], 403),

                ValidationException::class => response()->json(['errors' => $e->getMessage()], 403),

                default => response()->json(['error' => $e->getMessage()], 400),
            };

            return $response;
        });
        })->create();
