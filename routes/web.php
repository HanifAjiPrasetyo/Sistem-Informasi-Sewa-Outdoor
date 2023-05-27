<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMemberController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;


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

// Home Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product:id}', [ProductController::class, 'show']);
Route::get('/about-us', [HomeController::class, 'about']);

// Dashboard Routes
Route::prefix('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->middleware('admin');

    // Dashboard Product Routes
    Route::resource('/products', DashboardProductController::class)->middleware('admin');

    // Dashboard Member Routes
    Route::resource('/members', DashboardMemberController::class)->middleware('admin');

    Route::get('/billings', function () {
        return view('dashboard.billings.index');
    });
    Route::get('/transactions', function () {
        return view('dashboard.transactions.index');
    });
    Route::get('/profile', function () {
        return view('dashboard.edit-profile.index');
    });
});

// User Routes
Route::get('/user/cart', fn () => view('user.cart'));

//Register Routes
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Login / Logout Routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Reset Password
Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->middleware('guest')->name('password.request');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->middleware('guest')->name('password.post');
