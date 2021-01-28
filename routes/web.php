<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\AuthMiddleware;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ShipController;
use \App\Http\Controllers\RankController;
use \App\Http\Controllers\NotificationController;
use \App\Http\Controllers\FrontendController;
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
Route::get('/', '\App\Http\Controllers\FrontendController@login')->name('login');
Route::post('/login','\App\Http\Controllers\AuthController@login');

Route::middleware([AuthMiddleware::class])->group(function(){
    Route::get('/log','\App\Http\Controllers\LogActionController@index')->name('log');
    Route::get('/index','\App\Http\Controllers\FrontendController@index')->name('index');
    Route::get('/logout','\App\Http\Controllers\AuthController@logout')->name('logout');
    Route::resources([
        'users' => UserController::class,
        'ships' => ShipController::class,
        'ranks' => RankController::class,
        'notifications' => NotificationController::class
    ]);
});
