<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Livewire\RechercheCovoiturage;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/profil', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/admin/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/contact', [ContactController::class, 'create'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/base', function () {
    return view('base');
});

Route::get('/covoiturage', function () {
    return view('covoiturage');
});
