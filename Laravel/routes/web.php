<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgetPasswordController;
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
//TODO: jog ellenőrzése route-nál
Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => [LoggedInMiddleware::class]], function() {
        Route::get('/', [MainController::class, 'main']);
        Route::get('/main', [MainController::class, 'main']);
        Route::post('/main', [MainController::class, 'main']);
        Route::get('/logout', [MainController::class, 'logout']);
        Route::get('/options', [MainController::class, 'options'])->name('options');
        Route::get('/useroptions', [MainController::class, 'useroptions'])->name('useroptions');
        Route::get('/courseoptions', [MainController::class, 'courseoptions'])->name('courseoptions');
        Route::get('/listcourses', [MainController::class, 'listcourses'])->name('listcourses');
        Route::get('/addcourse', [MainController::class, 'addcourse'])->name('addcourse');
        Route::post('/useroptionscheck', [MainController::class, 'useroptionscheck']);
        Route::post('/checkcoursesingle', [MainController::class, 'checkcoursesingle']);
        Route::post('/checkcoursemultiple', [MainController::class, 'checkcoursemultiple']);
        Route::post('/checkpassword', [MainController::class, 'checkpassword']);
        Route::get('/course/{id}', [MainController::class, 'course'])->name('course');
        Route::get('/coursepost/{id}', [MainController::class, 'coursepost'])->name('coursepost');
        Route::post('/coursepostdestroy/{id}', [MainController::class, 'coursepostdestroy'])->name('coursepostdestroy');
    });

    Route::group(['middleware' => [GuestMiddleware::class]], function() {
        Route::get('/login', [MainController::class, 'login']);
        Route::post('/checklogin', [MainController::class, 'checklogin']);
        Route::get('/register', [RegisterController::class,'register']);
        Route::post('/checkregister', [RegisterController::class, 'checkregister']);
        Route::get('/sendemail', [ForgetPasswordController::class, 'sendemail']);
        Route::post('/send_email', [ForgetPasswordController::class, 'send_email']);
        Route::get('/forget_password',[ForgetPasswordController::class, 'forget_password']);
        Route::post('/change_password', [ForgetPasswordController::class, 'change_password']);
        Route::get('/check_code', [ForgetPasswordController::class, 'check_code']);
        Route::post('/checkcode', [ForgetPasswordController::class, 'checkcode']);
    });
});



