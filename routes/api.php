<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TesteController;
use App\Http\Controllers\Api\AccessController;
use App\Http\Controllers\Api\ServantsController;
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
Route::get('servants/export', [ServantsController::class, 'download']);

Route::middleware('auth:sanctum')->group(function () {
        // AUTH_CONTROLLER
    Route::apiResource('auth', AuthController::class);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::put('mode/{id}', [AuthController::class, 'theme']);
    
        // USER_CONTROLLER
    Route::apiResource('users', UserController::class);
    
        // CATEGORY_CONTROLLER
    Route::apiResource('categories', CategoryController::class);
    
        // SERVANTS_CONTROLLER
    Route::apiResource('servants', ServantsController::class);
    Route::post('servants/search', [ServantsController::class, 'search']);
    
        // ACCESS_CONTROLLER
    Route::apiResource('accesses', AccessController::class);
    
        // TEST_CONTROLLER
    Route::get('teste', [TesteController::class, 'index'])->middleware('ability:moderator,admin');
});