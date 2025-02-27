<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\JurusanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('mhs')->group(function () {

    Route::get('/', [MhsController::class, 'index'])->name("mhs.index");
    Route::get('/all', [MhsController::class, 'all'])->name("mhs.all");
    Route::post('/store', [MhsController::class, 'store'])->name("mhs.store");
    Route::put('/edit/{nim}', [MhsController::class, 'edit'])->name("mhs.edit");
    Route::delete('/delete/{nim}', [MhsController::class, 'delete'])->name("mhs.delete");

});

Route::prefix('jurusan')->group(function () {

    Route::get('/', [JurusanController::class, 'index'])->name("jurusan.index");
    Route::get('/all', [JurusanController::class, 'all'])->name("jurusan.all");

});