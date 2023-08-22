<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-post', [AuthController::class, 'registerPost'])->name('register.post');
    Route::post('/login-post', [AuthController::class, 'loginPost'])->name('login.post');

});

Route::middleware('auth')->group(function () {
    Route::get('/user-profile-update', [UserController::class, 'userProfileUpdate'])->name('user.profile.update');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');
Route::get('/verify-first', function () {
    return view('auth.verify-first');
});



