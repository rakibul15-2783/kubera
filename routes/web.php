<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Entrepreneur\EntrepreneurController;
use App\Http\Controllers\Investor\InvestorController;
use App\Http\Controllers\Entrepreneur\ProjectController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Investor\InvestorProjectController;
use App\Http\Controllers\Entrepreneur\EntrepreneurMessageController;
use App\Http\Controllers\Investor\InvestorMessageController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Entrepreneur\SubscriptionController;

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
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-post', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-post', [AuthController::class, 'loginPost'])->name('login.post');


});

//user section
Route::middleware('auth')->group(function () {
    Route::get('/user/role', [UserController::class, 'userRole'])->name('user.role');
    Route::get('/investor', [InvestorController::class, 'profileUpdate'])->name('investor');
    Route::post('/investor-profile-update-post/{id}', [InvestorController::class, 'profileUpdatePost'])->name('investor.profile.update.post');
    Route::get('/investor-profile', [InvestorController::class, 'profile'])->name('investor.profile');
    Route::get('/investor/profile/update', [InvestorController::class, 'profileEdit'])->name('investor.profile.edit');
    Route::post('/investor/profile/update/post/{id}', [InvestorController::class, 'profileEditPost'])->name('investor.profile.edit.post');

    Route::get('/entrepreneur', [EntrepreneurController::class, 'profileUpdate'])->name('entrepreneur');
    Route::post('/entrepreneur-profile-update-post/{id}', [EntrepreneurController::class, 'profileUpdatePost'])->name('entrepreneur.profile.update.post');
    Route::get('/entrepreneur-profile', [EntrepreneurController::class, 'profile'])->name('entrepreneur.profile');
    Route::get('/entrepreneur/profile/update', [EntrepreneurController::class, 'profileEdit'])->name('entrepreneur.profile.edit');
    Route::post('/entrepreneur/profile/update/post/{id}', [EntrepreneurController::class, 'profileEditPost'])->name('entrepreneur.profile.edit.post');

    Route::middleware('user.verified')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        //entrepreneur route
        Route::middleware('entrepreneur')->group(function () {
            Route::get('/my-project', [ProjectController::class, 'myProject'])->name('my.project');
            Route::get('/project-search', [ProjectController::class, 'projectSearch'])->name('project.search');
            Route::get('/add-project', [ProjectController::class, 'addProject'])->name('add.project')->middleware('subscription');
            Route::post('/project-submit', [ProjectController::class, 'projectSubmit'])->name('project.submit')->middleware('subscription');
            Route::get('/my-project-details/{id}', [ProjectController::class, 'projectDetails'])->name('my.project.details');
            Route::get('/edit-project/{id}', [ProjectController::class, 'editProject'])->name('edit.project');
            Route::post('/update-project/{id}', [ProjectController::class, 'updateProject'])->name('update.project');
            Route::get('/delete-project/{id}', [ProjectController::class, 'deleteProject'])->name('delete.project');
            Route::get('/subscription', [SubscriptionController::class, 'subscription'])->name('subscription');
            Route::post('/purchase-subscription/{userId}', [SubscriptionController::class, 'purchaseSubscription'])->name('purchase.subscription');
            Route::get('/entrepreneur-messages/{projectId}', [EntrepreneurMessageController::class, 'messages'])->name('entrepreneur.messages');
            Route::get('/entrepreneur-messages/{projectId}', [EntrepreneurMessageController::class, 'messages'])->name('entrepreneur.messages');
            Route::get('/entrepreneur-message/{messageId}', [EntrepreneurMessageController::class, 'message'])->name('entrepreneur.message');
            Route::post('/entrepreneur-message-post/{messageId}', [EntrepreneurMessageController::class, 'messagePost'])->name('entrepreneur.message.post');

        });

        //investor route
        Route::middleware('investor')->group(function () {
            Route::get('/show-projects', [InvestorProjectController::class, 'projects'])->name('show.projects');
            Route::get('/project-info/{id}', [InvestorProjectController::class, 'projectDetails'])->name('project.info');
            Route::get('investor-message/{projectId}', [InvestorMessageController::class, 'message'])->name('investor.message');
            Route::post('/investor-message-post/{projectId}', [InvestorMessageController::class, 'messagePost'])->name('investor.message.post');
        });

    });

    //if user status is 1
    Route::middleware('user.access')->group(function () {

    });
});

// admin section
Route::middleware('admin.access')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/user-list', [AdminController::class, 'users'])->name('user.list');
    Route::get('/search-user-list', [AdminController::class, 'searchUsers'])->name('search.user.list');
    Route::get('/user-profile/{id}', [AdminController::class, 'userProfile'])->name('user.profile');
    Route::get('/new-user-list', [AdminController::class, 'newUser'])->name('new.user.list');
    Route::get('/points', [AdminController::class, 'point'])->name('point');
    Route::post('/donate-points', [AdminController::class, 'donatePoint'])->name('donate.point');
    Route::get('/new-user-profile/{id}', [AdminController::class, 'newUserProfile'])->name('new.user.profile');
    Route::get('/new-user-accept/{id}', [AdminController::class, 'userAccept'])->name('new.user.accept');
    Route::get('/new-user-deny/{id}', [AdminController::class, 'userDeny'])->name('new.user.deny');
    Route::get('/plan', [PlanController::class, 'plan'])->name('plan');
    Route::post('/plan-post', [PlanController::class, 'planPost'])->name('plan.post');
    Route::get('/admin-change-password', [AdminAuthController::class, 'changePassword'])->name('admin.password');
    Route::post('/admin-change-password-post/{id}', [AdminAuthController::class, 'changePasswordPost'])->name('admin.password.post');
    Route::get('/all-project', [AdminProjectController::class, 'projects'])->name('all.project');
    Route::get('/project-details/{id}', [AdminProjectController::class, 'projectDetails'])->name('project.details');
});


Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin-login-post', [AdminAuthController::class, 'loginPost'])->name('admin.login.post');
Route::get('/admin-logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
//user logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');
Route::get('/verify-first', function () {
    return view('auth.verify-first');
});



