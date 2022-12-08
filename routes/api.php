<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ItemApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\SubcategoryApiController;
use Illuminate\Support\Facades\Route;

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

Route::post('/auth/register', [AuthApiController::class, 'register']);
Route::post('/auth/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::get('/categories/{id}', [CategoryApiController::class, 'show']);

    Route::get('/subcategories', [SubcategoryApiController::class, 'index']);
    Route::get('/subcategories/{id}', [SubcategoryApiController::class, 'show']);

    Route::get('/items', [ItemApiController::class, 'index']);
    Route::get('/items/{id}', [ItemApiController::class, 'show']);

    Route::post('/orders', [OrderApiController::class, 'store'])->middleware('user.activated');
});
