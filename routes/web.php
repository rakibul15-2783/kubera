<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Entrepreneur\EntrepreneurController;
use App\Http\Controllers\Inverstor\InsvestorController;

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

//user section
Route::middleware('auth')->group(function () {
    Route::get('/user-role', [UserController::class, 'userRole'])->name('user.role');
    Route::get('/investor', [InsvestorController::class, 'investorProfileUpdate'])->name('investor');
    Route::get('/entrepreneur', [EntrepreneurController::class, 'entrepreneurProfileUpdate'])->name('entrepreneur');
    // Route::post('/user-profile-update-post/{id}', [UserController::class, 'profileUpdatePost'])->name('user.profile.update.post');

    Route::middleware('user.access')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    });
});

// admin section
Route::middleware('admin.access')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin-change-password', [AdminController::class, 'changePassword'])->name('admin.password');
    Route::get('/admin-change-password-post', [AdminController::class, 'changePasswordPost'])->name('admin.password.post');
});


Route::get('/admin-login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin-login-post', [AdminController::class, 'loginPost'])->name('admin.login.post');
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');
//user logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');
Route::get('/verify-first', function () {
    return view('auth.verify-first');
});



