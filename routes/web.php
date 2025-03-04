<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function() {
    // http://127.0.0.1:8000/auth/login
    Route::post('/login', LoginController::class)->middleware('guest');
    // http://127.0.0.1:8000/auth/logout
    Route::post('/logout', LogoutController::class);
    // http://127.0.0.1:8000/auth/register
    Route::post('/register', RegisterController::class)->middleware('guest');
});
