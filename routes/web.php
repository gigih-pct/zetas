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
        Route::get('/proyek', function () {
            return view('dashboard.proyek.index');
        })->name('dashboard.proyek');

        Route::get('/rab', function () {
            return view('dashboard.rab.index');
        })->name('dashboard.rab');
        
        Route::get('/bahan', function () {
            return view('dashboard.bahan.index');
        })->name('dashboard.bahan');

        Route::get('/harga-bahan', function () {
            return view('dashboard.bahan.harga');
        })->name('dashboard.harga-bahan');

        Route::get('/armada', function () {
            return view('dashboard.armada.index');
        })->name('dashboard.armada');

        Route::get('/pekerja', function () {
            return view('dashboard.pekerja.index');
        })->name('dashboard.pekerja');
    });

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
