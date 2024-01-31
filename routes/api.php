<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TesteController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    // AUTH
Route::post('login', [AuthController::class, 'login']);
    
Route::middleware('auth:sanctum')->group(function () {
        // AUTH_CONTROLLER
    Route::apiResource('auth', AuthController::class);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::put('mode/{id}', [AuthController::class, 'theme']);

        // USER_CONTROLLER
    Route::apiResource('users', UserController::class);

        // CATEGORY_CONTROLLER
    Route::apiResource('categories', CategoryController::class);

        // TEST_CONTROLLER
    Route::get('teste', [TesteController::class, 'index'])->middleware('ability:moderator,admin');
});