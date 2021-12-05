<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('account_login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'createAccount'])->name('account_register');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('signout', [AuthController::class, 'signOut'])-name('signout');