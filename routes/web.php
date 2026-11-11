<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', [BarangController::class, 'index'])->name('barang.index');

Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');

Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');

Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
