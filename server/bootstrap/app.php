<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    api: __DIR__ . '/../routes/api.php',
    apiPrefix: 'api/v1',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware) {})
  ->withExceptions(function (Exceptions $exceptions) {
    $exceptions->renderable(function (RouteNotFoundException $e, Request $request) {
      if ($request->is('api/*')) {
        return response()->json(['message' => $e->getMessage()], 404);
      }
    });
    $exceptions->renderable(function (InternalErrorException $e, Request $request) {
      if ($request->is('api/*')) {
        return response()->json(['message' => $e->getMessage()], 500);
      }
    });
  })->create();
