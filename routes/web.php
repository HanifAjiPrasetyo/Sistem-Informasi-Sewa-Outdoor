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
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserProfileController;

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

// User Cart Routes
Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'addItem']);
    Route::post('/cart/update', [CartController::class, 'updateItem']);
    Route::get('/cart/delete', [CartController::class, 'deleteItem']);
    Route::get('/cart/clear', [CartController::class, 'clearCart']);
});

// User Profile Routes
Route::resource('/user/profile', UserProfileController::class)->middleware('auth');

//Register Routes
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Login / Logout Routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Reset & Change Password
Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->middleware('guest')->name('password.request');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->middleware('guest')->name('password.post');


Route::get('form', [HomeController::class, 'address']);
Route::post('/getRegency', [HomeController::class, 'getRegency'])->name('getRegency');
Route::post('/getDistrict', [HomeController::class, 'getDistrict'])->name('getDistrict');
Route::post('/getVillage', [HomeController::class, 'getVillage'])->name('getVillage');
