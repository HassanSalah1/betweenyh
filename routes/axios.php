<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// middleware(['auth'])->
Route::prefix('axios')->group(function () {
    Route::get('users', [Controllers\AxiosController::class, 'users']);
    Route::get('roles', [Controllers\AxiosController::class, 'roles']);
    Route::get('permissions', [Controllers\AxiosController::class, 'permissions']);
    Route::get('socials', [Controllers\AxiosController::class, 'socials']);
    Route::get('orders', [Controllers\AxiosController::class, 'orders']);
    Route::get('pages', [Controllers\AxiosController::class, 'pages']);

});
