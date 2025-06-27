<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

Route::get('/', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');


Route::middleware('auth')->group(function () {
    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); 
        Route::resource('materials', MaterialController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('students', StudentController::class);
        
    });

    Route::middleware('auth')->prefix('siswa')->group(function () {
        Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard'); 
        Route::get('/akses-materi', [SiswaController::class, 'materi'])->name('siswa.materi'); 
        Route::get('/isi-kuisioner', [SiswaController::class, 'kuisioner'])->name('siswa.kuisioner'); 
        Route::get('/prediksi', [SiswaController::class, 'kuisionerHasil'])->name('siswa.prediksi'); 
        Route::post('/isi-kuisioner/submit', [SiswaController::class, 'kuisionerSubmit'])->name('siswa.kuisioner.submit'); 
        Route::post('/siswa/prediksi/reset', [SiswaController::class, 'resetPrediksi'])->name('siswa.reset.prediksi');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
