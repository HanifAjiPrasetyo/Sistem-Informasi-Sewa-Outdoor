<?php

use App\Http\Controllers\backend\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::get('/members', function () {
        return view('dashboard.members.index');
    });
    Route::get('/products', function () {
        return view('dashboard.products.index');
    });
    Route::get('/billings', function () {
        return view('dashboard.billings.index');
    });
    Route::get('/transactions', function () {
        return view('dashboard.transactions.index');
    });
});

Route::get('/user/cart', fn () => view('user.cart'));

Route::get('/login', fn () => view('login.index'));
Route::get('/register', fn () => view('register.index'));
Route::get('/products', fn () => view('products.index'));
