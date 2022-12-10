<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/admin');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::resources([
        'users' => UserController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'categories' => CategoryController::class,
        'subcategories' => SubcategoryController::class,
        'items' => ItemController::class,
    ], ['except' => 'show']);

    Route::put('/users/{user}/password', [UserController::class, 'updatePassword'])->name('users.password.update');

    Route::get('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');

    Route::get('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
});
