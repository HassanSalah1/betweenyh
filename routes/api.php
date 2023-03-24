<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  \App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\SocialController;
use \App\Http\Controllers\Api\ServicesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class , 'users'])->middleware('auth:sanctum');
Route::get('/users/{code}', [UserController::class , 'user'])->middleware('auth:sanctum');

Route::get('/socials', [SocialController::class , 'socials'])->middleware('auth:sanctum');
Route::post('/socials/user', [SocialController::class , 'createOrUpdate'])->middleware('auth:sanctum');


Route::get('/services', [ServicesController::class , 'services'])->middleware('auth:sanctum');
Route::post('/services/user', [ServicesController::class , 'createOrUpdate'])->middleware('auth:sanctum');
