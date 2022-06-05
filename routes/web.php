<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\GameController;
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

Route::get('/', [Controller::class, 'main_page'])->name('main_page');

Route::get('/reg', [Controller::class, 'reg'])->name('reg_page');
Route::post('/reg/create', [UserController::class, 'create'])->name('reg_create');

Route::get('/login', [Controller::class, 'login'])->name('login_page');
Route::post('/login/check', [UserController::class, 'check'])->name('login_check');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/lk', [UserController::class, 'lk'])->name('lk');
Route::post('/lk/update', [UserController::class, 'update'])->name('lk_update');
Route::get('/lk/change_password', [Controller::class, 'lk_change_password'])->name('lk_change_password');
Route::post('change_password', [UserController::class, 'change_password'])->name('change_password');

Route::post('/check_game_score', [GameController::class, 'check_score'])->name('check_game_score');