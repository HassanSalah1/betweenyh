<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  \App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\SocialController;
use \App\Http\Controllers\Api\ServicesController;
use \App\Http\Controllers\Api\OrderController;
use \App\Http\Controllers\Api\HomeController;
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
Route::post('/register', [UserController::class , 'register']);
Route::post('/login', [UserController::class , 'login']);
Route::post('/forget-password', [UserController::class , 'forgetPassword']);
Route::post('/change-password', [UserController::class , 'createPassword']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/settings', [HomeController::class , 'index'])->middleware('auth:sanctum');


Route::get('/users', [UserController::class , 'users'])->middleware('auth:sanctum');
Route::post('/update-profile', [UserController::class , 'updateProfile'])->middleware('auth:sanctum');
Route::get('/users/{code}', [UserController::class , 'user'])->middleware('auth:sanctum');
Route::get('/get-user-info', [UserController::class , 'profile'])->middleware('auth:sanctum');

Route::post('/allow-notification', [UserController::class , 'updateNotification'])->middleware('auth:sanctum');


Route::get('/socials', [SocialController::class , 'socials'])->middleware('auth:sanctum');
Route::get('/socials/user', [SocialController::class , 'userSocials'])->middleware('auth:sanctum');
Route::post('/socials/user', [SocialController::class , 'createOrUpdate'])->middleware('auth:sanctum');
Route::post('/socials/update', [SocialController::class , 'update'])->middleware('auth:sanctum');
Route::post('/socials/delete/{id}', [SocialController::class , 'destroy'])->middleware('auth:sanctum');



Route::get('/services', [ServicesController::class , 'services'])->middleware('auth:sanctum');
Route::get('/services/user', [ServicesController::class , 'user'])->middleware('auth:sanctum');
Route::post('/services/user', [ServicesController::class , 'createOrUpdate'])->middleware('auth:sanctum');
Route::post('/services/delete/{id}', [ServicesController::class , 'destroy'])->middleware('auth:sanctum');
Route::post('/services/update', [ServicesController::class , 'update'])->middleware('auth:sanctum');


Route::get('/order-status', [OrderController::class , 'order'])->middleware('auth:sanctum');
Route::post('/order-card', [OrderController::class , 'create'])->middleware('auth:sanctum');
Route::post('/order-confirm', [OrderController::class , 'confirm'])->middleware('auth:sanctum');
