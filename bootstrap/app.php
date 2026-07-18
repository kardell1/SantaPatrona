<?php

use App\Http\Supports\NormalizedResponse;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (ValidationException $e) {
            // Convert validation errors into a flat array structure
            $errors = [];
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $errors[] = [
                        'field' => $field,
                        'message' => $message,
                    ];
                }
            }
            return NormalizedResponse::error($errors, 'ValidationException', 422);
        });

        $exceptions->render(function (NotFoundHttpException $e) {
            return NormalizedResponse::error([], 'Record not found.', 422);
        });


        $exceptions->render(function (QueryException $e) {
            return NormalizedResponse::error([
                'sql' => $e->getSql(),
                'bindings' => $e->getBindings(),
                'error' => $e->getMessage(),
            ], 'Error en la consulta a la base de datos.', 500);
        });
    })->create();
