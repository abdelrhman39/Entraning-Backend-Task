<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('welcome');
})->name('home');


Route::get('/sign-up', [AuthController::class , 'front_sign_up']);

Route::get('/log-in', [AuthController::class ,'front_log_in'])->name('login');

Route::post('sign-up', [AuthController::class , 'sign_up'])->name('sign_up');
Route::post('log-in', [AuthController::class , 'log_in'])->name('log_in');

Route::get('/logout',[AuthController::class , 'logout']);

