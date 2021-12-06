<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::get('profile_edit', [AuthController::class, 'profileEdit'])->name('profile_edit');
Route::post('profile_edit', [AuthController::class, 'profileSave'])->name('profile_save');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('profile_delete', [AuthController::class, 'profileDelete'])->name('profile_delete');
Route::get('customer', [UserController::class, 'customerView'])->name('customer');
Route::get('employee', [UserController::class, 'employeeView'])->name('employee');
Route::post('archive_user', [UserController::class, 'archiveUser'])->name('archive_user');
Route::post('delete_user', [UserController::class, 'deleteUser'])->name('delete_user');
Route::get('user_edit/{user_id}', [UserController::class, 'userEdit'])->name('user_edit');
Route::post('user_edit/{user_id}', [UserController::class, 'userSave'])->name('user_save');