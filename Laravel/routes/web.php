<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\LoggedInMiddleware;
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
Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => [LoggedInMiddleware::class]], function() {
        Route::get('/', [MainController::class, 'main']);
        Route::get('/main', [MainController::class, 'main']);
        Route::post('/main', [MainController::class, 'main']);
        Route::get('/login', [MainController::class, 'login']);
        Route::get('/logout', [MainController::class, 'logout']);
        Route::get('/options', [MainController::class, 'options'])->name('options');
        Route::get('/useroptions', [MainController::class, 'useroptions'])->name('useroptions');
        Route::get('/courseoptions', [MainController::class, 'courseoptions'])->name('courseoptions');
        Route::post('/useroptionscheck', [MainController::class, 'useroptionscheck']);
    });

    Route::group(['middleware' => [GuestMiddleware::class]], function() {
        Route::get('/login', [MainController::class, 'login']);
        Route::post('/checklogin', [MainController::class, 'checklogin']);
    });
});



