<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthUserController;
use App\Http\Controllers\API\Master\UserController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// route yang tidak pake authentikasi
Route::post('login', [AuthUserController::class, 'login']);
Route::post('register', [AuthUserController::class, 'register']);

// route yang pake authentikasi
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthUserController::class, 'logout']);
    Route::get('refresh', [AuthUserController::class, 'refresh']);
    Route::get('me', [AuthUserController::class, 'me']);
});

// Master
Route::apiResource('user', UserController::class);
