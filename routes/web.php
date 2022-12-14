<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TokoController;

// private admin
use App\Http\Controllers\Private\Admin\DashboardController;
use App\Http\Controllers\Private\Admin\SellersController;
use App\Http\Controllers\Private\Admin\KategoriController;
use App\Http\Controllers\Private\Auth\LoginController;
use App\Http\Controllers\Private\Auth\RegisterController;
use App\Http\Controllers\Private\Toko\DashboardController as TokoDashboardController;
use App\Http\Controllers\Private\Toko\KomentarController;
use App\Http\Controllers\Private\Toko\PasswordController;
use App\Http\Controllers\Private\Toko\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/search', [HomeController::class, 'search'])->name('index.search');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('index.tentang');
Route::get('/kategori', [HomeController::class, 'datakategori'] )->name('datakategori');
Route::get('/kategori/{slugkate}', [HomeController::class, 'databykategori'] )->name('databycategori');
Route::get('/toko/{toko}', [TokoController::class, 'toko']);
Route::post('/toko/{toko}/postkoment', [TokoController::class, 'postkoment']);
Route::get('/produk/{prod}', [HomeController::class, 'detailproduk'])->name('detail.produk');

// login
Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');
Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('register');
Route::post('/auth/logout', [LoginController::class, 'logout'])->name('logout');

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

    // kategori
    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/admin/kategori/{slug_kategori}/edit', [KategoriController::class, 'edit']);
    Route::post('/admin/kategori/{id}/update', [KategoriController::class, 'update'])->name('update.kategori');
    Route::delete('/admin/kategori/{id}/hapus', [KategoriController::class, 'delete'])->name('hapus.kategori');
    Route::post('/admin/kategori/add', [KategoriController::class, 'store'])->name('admin.addcategory');

});

// aktor toko (penjual/seller)
Route::group(['middleware' => ['auth', 'Cekrole:toko']], function(){
    Route::get('/tokos/dashboard', TokoDashboardController::class)->name('toko.dashboard');
    Route::resource('/tokos/product', ProductController::class);
    Route::post('/tokos/product/addimageslide', [ ProductController::class, 'addimageslide'])->name('addimageslide');
    // pass
    Route::get('/tokos/profile', [PasswordController::class, 'index'])->name('profile.index');
    Route::get('/tokos/profile/{id}', [PasswordController::class, 'editprofile'])->name('profile.edit');
    Route::put('/tokos/profile/{id}', [PasswordController::class, 'update'])->name('profile.update');
    Route::post('/tokos/profile/gantipw', [PasswordController::class, 'gantipw'])->name('profile.gantipw');

    Route::resource('/tokos/komentar', KomentarController::class);
    // Route::get('/tokos/{slug_kategori}', [ProductController::class, 'product_by_slug']);
});
