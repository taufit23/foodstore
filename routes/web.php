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
use App\Http\Controllers\Private\Toko\PasswordController;
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
    // get sellers
    Route::get('/admin/invalid_sellers', [SellersController::class, 'invalidseller'])->name('sellers.invalid');
    Route::get('/admin/frozen_sellers', [SellersController::class, 'frozenseller'])->name('sellers.frozen');
    // validasi
    Route::post('/admin/sellers/makefrozen/{id}', [SellersController::class, 'makefrozen'])->name('sellers.makefrozen');
    Route::post('/admin/sellers/makevalid/{id}', [SellersController::class, 'makevalid'])->name('sellers.makevalid');
});

// aktor toko (penjual/seller)
Route::group(['middleware' => ['auth', 'Cekrole:toko']], function(){
    Route::get('/tokos/dashboard', TokoDashboardController::class)->name('toko.dashboard');
    Route::resource('/tokos/product', ProductController::class);
    Route::post('/tokos/product/addimageslide', [ ProductController::class, 'addimageslide'])->name('addimageslide');

    // pass
    Route::get('/tokos/profile', [PasswordController::class, 'index'])->name('profile.index');
    Route::post('/tokos/profile/gantipw', [PasswordController::class, 'gantipw'])->name('profile.gantipw');
    // kategori
    Route::get('/tokos/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/tokos/kategori/add', [KategoriController::class, 'store'])->name('toko.addcategory');
    // Route::get('/tokos/{slug_kategori}', [ProductController::class, 'product_by_slug']);
});
