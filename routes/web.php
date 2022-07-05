<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;

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

Route::get('/', [UserController::class, 'beranda'])->name('beranda.index');
Route::get('produk', [UserController::class, 'produk'])->name('produk.index');
Route::get('home', [HomeController::class, 'index'])->name('home');

// Route Login Admin
Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.index');
Route::post('admin/login', [AdminLoginController::class, 'login']);


Route::group(['middleware' => 'prevent-back-history'], function() {
    Route::middleware('auth:admin')->group(function () {
        Route::get('admin/dashboards', [AdminController::class, 'dashboard'])->name('dashboard.index');
        Route::get('admin/pesanans', [AdminController::class, 'pesanan'])->name('pesanan.index');
        Route::resource('admin/produks', AdminController::class);
    });
});

Route::group(['middleware' => 'prevent-back-history'], function() {
    Auth::routes();
    Route::middleware('auth')->group(function() {
        Route::get('produk-detail-{id}', [UserController::class, 'produkDetail'])->name('produk.show');
        Route::post('produk-add-to-cart-{id}', [UserController::class, 'pesan'])->name('pesan.store');
        Route::get('cart', [UserController::class, 'cart'])->name('cart.index');
        Route::delete('cart-delete-{id}', [UserController::class, 'cartDelete'])->name('cart.destroy');
        Route::post('check-out-{id}', [UserController::class, 'checkOut'])->name('checkOut.store');
        Route::get('profile', [UserController::class, 'profile'])->name('profile.index');
        Route::post('profile-update-{id}', [UserController::class, 'profileUpdate'])->name('profile.store');
    });
});


