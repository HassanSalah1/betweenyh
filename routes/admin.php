<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

// 'auth',
Route::prefix('admin')->middleware(['theme', 'auth'])->group(function () {
    Route::get('dashboard', [Dashboard\DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('dashboard/{theme}', [Dashboard\DashboardController::class, 'theme'])->name('admin.theme');
    Route::resource('permissions', Dashboard\PermissionController::class)->except('show');
    Route::resource('roles', Dashboard\RoleController::class);
    Route::resource('users', Dashboard\UserController::class);
    Route::resource('socials', Dashboard\SocialController::class);
    Route::resource('orders', Dashboard\OrderController::class);
    // Route::get('users/permissions/{user}/edit', [Dashboard\UserController::class, 'editPermission'])->name('users.permissions.edit');
    // Route::post('users/permissions/{user}/update', [Dashboard\UserController::class, 'updatePermission'])->name('users.permissions.update');

});
