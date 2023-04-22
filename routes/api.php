<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Users\Infrastructure\Controller\API\AuthController;
use Src\Users\Infrastructure\Controller\API\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('create-user', RegisterController::class);
Route::post('sign-user', AuthController::class);
