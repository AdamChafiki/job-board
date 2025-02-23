<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController as APIAuthController;

// Auth routes
Route::controller(APIAuthController::class)->group(function () {
  Route::post('register', 'register');
  Route::post('login', 'login');
  Route::middleware('auth:sanctum')->post('logout', 'logout');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
