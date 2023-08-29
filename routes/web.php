<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Entrepreneur\EntrepreneurController;
use App\Http\Controllers\Inverstor\InsvestorController;
use App\Http\Controllers\Entrepreneur\ProjectController;

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
    Route::get('/investor', [InsvestorController::class, 'profileUpdate'])->name('investor');
    Route::post('/investor-profile-update-post/{id}', [InsvestorController::class, 'profileUpdatePost'])->name('investor.profile.update.post');
    Route::get('/investor-profile', [InsvestorController::class, 'profile'])->name('investor.profile');
    Route::get('/entrepreneur', [EntrepreneurController::class, 'profileUpdate'])->name('entrepreneur');
    Route::post('/entrepreneur-profile-update-post/{id}', [EntrepreneurController::class, 'profileUpdatePost'])->name('entrepreneur.profile.update.post');
    Route::get('/entrepreneur-profile', [EntrepreneurController::class, 'profile'])->name('entrepreneur.profile');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/my-project', [ProjectController::class, 'myProject'])->name('my.project');
    Route::get('/add-project', [ProjectController::class, 'addProject'])->name('add.project');
    Route::post('/project-submit', [ProjectController::class, 'projectSubmit'])->name('project.submit');
    Route::get('/my-project-details', [ProjectController::class, 'projectDetails'])->name('my.project.details');


    //if user status is 1
    Route::middleware('user.access')->group(function () {

    });
});

// admin section
Route::middleware('admin.access')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/new-users', [AdminController::class, 'newUser'])->name('new.users');
    Route::get('/new-user-profile/{id}', [AdminController::class, 'newUserProfile'])->name('new.user.profile');
    Route::get('/new-user-accept/{id}', [AdminController::class, 'userAccept'])->name('new.user.accept');
    Route::get('/new-user-deny/{id}', [AdminController::class, 'userDeny'])->name('new.user.deny');
    Route::get('/admin-change-password', [AdminController::class, 'changePassword'])->name('admin.password');
    Route::post('/admin-change-password-post/{id}', [AdminController::class, 'changePasswordPost'])->name('admin.password.post');
    Route::get('/all-project', [AdminController::class, 'projects'])->name('all.project');
    Route::get('/project-details', [AdminController::class, 'projectDetails'])->name('project.details');
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



