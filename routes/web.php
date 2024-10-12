<?php

use App\Http\Controllers\PenerbanganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
});

Route::get('/penerbangan', [PenerbanganController::class, 'search']);

Route::get('/pesanan', [PesananController::class, 'pesanan'])->middleware(['auth', 'verified'])->name('pesanan');

Route::get('/pesanan/{id}', [PesananController::class, 'detail'])->middleware(['auth', 'verified'])->name('pesanan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/barcode/{code}', [BarcodeController::class, 'generateBarcode']);

require __DIR__ . '/auth.php';
