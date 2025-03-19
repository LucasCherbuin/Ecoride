<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/profil', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/admin/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


