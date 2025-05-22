<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('pages.dashboard');
Route::get('/search', [SearchController::class, 'index'])->name('search');


Auth::routes();

Route::get('/products', [ProductController::class, 'index'])->name('pages.products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('pages.products.create');
Route::post('/products', [ProductController::class, 'store'])->name('pages.products.store');
Route::get('products/{product}', [ProductController::class, 'show'])->name('pages.products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('pages.products.edit');
Route::put('products/{product}', [ProductController::class, 'update'])->name('pages.products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('pages.products.destroy');

Route::get('/penjualans', [PenjualanController::class, 'index'])->name('pages.penjualans.index');
Route::get('/penjualans/create', [PenjualanController::class, 'create'])->name('pages.penjualans.create');
Route::post('/penjualans', [PenjualanController::class, 'store'])->name('pages.penjualans.store');
Route::get('penjualans/{penjualan}', [PenjualanController::class, 'show'])->name('pages.penjualans.show');
Route::get('penjualans/{penjualan}/edit', [PenjualanController::class, 'edit'])->name('pages.penjualans.edit');
Route::put('penjualans/{penjualan}', [PenjualanController::class, 'update'])->name('pages.penjualans.update');
Route::delete('penjualans/{penjualan}', [PenjualanController::class, 'destroy'])->name('pages.penjualans.destroy');

Route::get('/barang', [BarangController::class, 'index'])->name('pages.barang.index');
