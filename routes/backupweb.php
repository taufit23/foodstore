<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\DsbSellerController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\DsbAdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DfSellerController;
use App\Http\Controllers\DfCustomerController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PflSellerController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Private\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/tampildata', [HomeController::class, 'tampildata'])->name('tampildata');
Route::get('/Kategori', [KategoriController::class, 'kategori']);
Route::get('/kategori/{slug}', [KategoriController::class, 'kprodukperkategori']);
Route::get('/toko/{toko}', [TokoController::class, 'toko']);


Route::get('/private/admin/dashboard', DashboardController::class);

// Route::group(['middleware' => ['auth', 'Cekrole:admin']], function() {
    Route::get('/DsbAdmin', [DsbAdminController::class, 'dsbadmin']);
    // route kategori
    Route::resource('/kategori', AdminKategoriController::class);
    // hapus kategori
    Route::delete('/kategori', [AdminKategoriController::class, 'destroy']);
    // route seller
    Route::resource('/dfseller', DfSellerController::class);
    // route customer
    Route::resource('/dfcustomer', DfCustomerController::class);
    // profil
    Route::get('/pfseller', [pflSellerController::class, 'index'])->name('daftarseller');
    // setting profil
    Route::get('/setseller', [pflSellerController::class, 'setting']);;
    Route::get('/pfcustomer', [pflSellerController::class, 'index'])->name('daftarcustomer');
    // setting profil
    Route::get('/setcustomer', [pflSellerController::class, 'setting']);;
// });

Route::group(['middleware' => ['auth', 'Cekrole:seller']], function() {
    Route::get('/DsbAdmin', [DsbAdminController::class, 'dsbadmin']);
    // route produk
    Route::resource('/produk', ProdukController::class);
    // hapus produk
    Route::delete('/produk', [ProdukController::class, 'destroy']);
    // route transaksi
    Route::resource('/transaksi', TransaksiController::class);
    // form laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    // proses laporan
    Route::get('/proseslaporan', [LaporanController::class, 'proses']);
    // image
    Route::get('/image', [ImageController::class, 'index'])->name('image');
    // simpan image
    Route::post('/image',  [ImageController::class, 'store'])->name('image.post');
    // hapus image by id
    Route::delete('/image/{id}',  [ImageController::class, 'destroy'])->name('image.hapus');

});

Route::group(['middleware' => ['auth', 'Cekrole:customer']], function() {
    Route::get('/DsbAdmin', [DsbAdminController::class, 'dsbadmin']);
});

Auth::routes();

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
