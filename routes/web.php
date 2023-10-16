<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\MessageController;
use App\Http\Controllers\User\UserController;
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

Route::prefix('user')->name('user.')->group(function () {
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/store','store')->name('store');
    });
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/auth','authentication')->name('auth');
        Route::get('/logout','logout')->middleware('auth')->name('logout');
    });
    Route::controller(UserController::class)->middleware('auth')->group(function () {
        Route::get('/get/users', 'getUsersExceptLoggedIn')->name('get');
    });
    Route::prefix('mail')->name('mail.')->controller(MessageController::class)->middleware('auth')->group(function () {
        Route::get('/', 'indexAction')->name('index');
        Route::post('/send','sendMessage')->name('send');
        Route::get('/sent','sentBox')->name('sent');
        Route::get('/{id}/view/{message}','view')->name('view');
        Route::post('/reply','reply')->name('reply');
        Route::put('/{id}/read/toggle','markedReadToggle')->name('marked.read.toggle');
        Route::put('/{id}/marked/toggle','markedToggle')->name('marked.toggle');

    });
});

//
