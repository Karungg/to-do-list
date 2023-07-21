<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyGuestMiddleware;
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

Route::view('/template', 'template');

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware([OnlyGuestMiddleware::class]);
    Route::post('/login', 'doLogin')->middleware([OnlyGuestMiddleware::class]);
    Route::post('/logout', 'doLogout');
});
