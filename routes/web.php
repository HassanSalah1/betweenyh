<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('lang/{lang}', [Controllers\HomeController::class, 'setLocale'])->name('lang');

Route::middleware('locale')->group(function () {
    require __DIR__ . '/auth.php';
    require __DIR__ . '/axios.php';
    require __DIR__ . '/admin.php';
});


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/user/{code}', [ProfileController::class , 'user']);

Route::get('/dashboard', function () {
    return redirect('/admin/dashboard');
    //return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
