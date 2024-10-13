<?php 

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function() {

    Route::get('/admin', [AdminController::class, 'home'])->name('home');

    //* ==== User Management ==== *//
    Route::get('/admin/user', [AdminController::class, 'user'])->name('user');

    Route::delete('/admin/user/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/admin/user/edit/{id}', [AdminController::class, 'updateUserAdmin'])->name('updateUserAdmin');

    //* ==== Penerbangan Management ==== *//
    Route::get('/admin/penerbangan', [AdminController::class, 'penerbangan'])->name('penerbangan');

    Route::post('/admin/penerbangan/add', [AdminController::class, 'addPenerbanganAdmin'])->name('addPenerbanganAdmin');

    Route::delete('/admin/penerbangan/delete/{id}', [AdminController::class, 'deletePenerbangan'])->name('deletePenerbangan');

    Route::get('/admin/penerbangan/edit/{id}', [AdminController::class, 'updatePenerbangan'])->name('updatePenerbangan');
});
