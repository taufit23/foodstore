<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TokoController;

// private admin
use App\Http\Controllers\Private\Admin\DashboardController;
use App\Http\Controllers\Private\Admin\SellersController;
use App\Http\Controllers\Private\Auth\LoginController;
use App\Http\Controllers\Private\Auth\RegisterController;
use App\Http\Controllers\Private\Toko\DashboardController as TokoDashboardController;
use App\Http\Controllers\Private\Toko\KategoriController;
use App\Http\Controllers\Private\Toko\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/toko/{toko}', [TokoController::class, 'toko']);
Route::post('/toko/{toko}/postkoment', [TokoController::class, 'postkoment']);


// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// admin
Route::group(['middleware' => ['auth', 'Cekrole:admin']], function() {
    Route::get('/admin/dashboard', DashboardController::class)->name('admin.dashboard');
    Route::resource('/admin/sellers', SellersController::class);
});

// aktor toko (penjual/seller)
Route::group(['middleware' => ['auth', 'Cekrole:toko']], function(){
    Route::get('/tokos/dashboard', TokoDashboardController::class)->name('toko.dashboard');
    Route::resource('/tokos/product', ProductController::class);
    Route::post('/tokos/product/addimageslide', [ ProductController::class, 'addimageslide'])->name('addimageslide');
    Route::get('/tokos/{slug_kategori}', [ProductController::class, 'product_by_slug']);
    Route::post('/tokos/kategori/add', [KategoriController::class, 'store'])->name('toko.addcategory');
});
