<?php

use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/api/v1.php';
require __DIR__ . '/api/v2.php';


// V1
Route::prefix('auth')->group(function() {
    // http://127.0.0.1:8000/api/auth/login
    Route::post('/login', LoginController::class);
    http://127.0.0.1:8000/api/auth/logout
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
    // http://127.0.0.1:8000/api/auth/register
    Route::post('/register', RegisterController::class);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
