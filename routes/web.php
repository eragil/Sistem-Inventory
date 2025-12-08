<?php

use App\Http\Controllers\CetakController;
use App\Livewire\Barang\Index as BarangIndex;
use App\Livewire\Barangkeluar;
use App\Livewire\Dashboard;
use App\Livewire\Karyawan;
use App\Livewire\Laporan;
use App\Livewire\Pembelian;
use App\Livewire\Penjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->get('/', Dashboard::class);

Route::redirect('/home', '/');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'barang', 'middleware' => ['auth']], function () {
    Route::get('/masuk', BarangIndex::class)->name('barang.index');
    Route::get('/keluar', Barangkeluar::class)->name('barang.keluar');
});
Route::group(['prefix' => 'transaksi', 'middleware' => ['auth']], function () {
    Route::get('/penjualan', Penjualan::class)->name('transaksi.jual');
    Route::get('/pembelian', Pembelian::class)->name('transaksi.beli');
});

Route::get('/laporan', Laporan::class)->middleware(['auth', 'role:admin'])->name('laporan');
Route::get('/karyawan', Karyawan::class)->middleware(['auth', 'role:admin'])->name('karyawan');

Route::get('/cetak/{apa}', [CetakController::class, 'cetak'])->middleware(['auth', 'role:admin'])->name('cetak');
Route::get('/excel/{apa}', [CetakController::class, 'excel'])->middleware(['auth', 'role:admin'])->name('excel');
Route::get('/nota-penjualan/{id}', [CetakController::class, 'notaPenjualan'])->middleware(['auth'])->name('nota-penjualan');
Route::get('/nota-pembelian/{id}', [CetakController::class, 'notaPembelian'])->middleware(['auth'])->name('nota-pembelian');
