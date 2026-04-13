<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Zetas Build & Construct - Main Router
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Overview / Beranda
    Route::get('/', function () {
        return view('dashboard.beranda.index');
    })->name('dashboard.beranda');

    // Internal Modules
    Route::prefix('dashboard/internal')->group(function () {
        Route::get('/proyek', [\App\Http\Controllers\ProjectController::class, 'index'])->name('dashboard.proyek');
        Route::post('/proyek', [\App\Http\Controllers\ProjectController::class, 'store'])->name('dashboard.proyek.store');
        Route::put('/proyek/{id}', [\App\Http\Controllers\ProjectController::class, 'update'])->name('dashboard.proyek.update');
        Route::delete('/proyek/{id}', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('dashboard.proyek.destroy');

        Route::get('/rab', function () {
            return view('dashboard.rab.index');
        })->name('dashboard.rab');
        
        Route::get('/bahan', [\App\Http\Controllers\InventoryController::class, 'index'])->name('dashboard.bahan');
        Route::post('/bahan', [\App\Http\Controllers\InventoryController::class, 'store'])->name('dashboard.bahan.store');
        Route::put('/bahan/{id}', [\App\Http\Controllers\InventoryController::class, 'update'])->name('dashboard.bahan.update');
        Route::delete('/bahan/{id}', [\App\Http\Controllers\InventoryController::class, 'destroy'])->name('dashboard.bahan.destroy');

        Route::get('/harga-bahan', [\App\Http\Controllers\MaterialPriceController::class, 'index'])->name('dashboard.harga-bahan');
        Route::post('/harga-bahan', [\App\Http\Controllers\MaterialPriceController::class, 'store'])->name('dashboard.harga-bahan.store');
        Route::put('/harga-bahan/{id}', [\App\Http\Controllers\MaterialPriceController::class, 'update'])->name('dashboard.harga-bahan.update');
        Route::delete('/harga-bahan/{id}', [\App\Http\Controllers\MaterialPriceController::class, 'destroy'])->name('dashboard.harga-bahan.destroy');

        Route::get('/armada', function () {
            return view('dashboard.armada.index');
        })->name('dashboard.armada');

        Route::get('/pekerja', [\App\Http\Controllers\WorkerController::class, 'index'])->name('dashboard.pekerja');
        Route::post('/pekerja', [\App\Http\Controllers\WorkerController::class, 'store'])->name('dashboard.pekerja.store');
        Route::put('/pekerja/{id}', [\App\Http\Controllers\WorkerController::class, 'update'])->name('dashboard.pekerja.update');
        Route::delete('/pekerja/{id}', [\App\Http\Controllers\WorkerController::class, 'destroy'])->name('dashboard.pekerja.destroy');
    });

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
