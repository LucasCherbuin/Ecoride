<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleChoiceController;
use App\Http\Livewire\RechercheCovoiturage;
require base_path('routes/auth.php');
require base_path('routes/pageCustomer.php');
require base_path('routes/pageEmployee.php');
require base_path('routes/pagesAdmin.php');
require base_path('routes/pagesVisiteurs.php');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/choisir-role', [RoleChoiceController::class, 'choisirRole'])->name('choisir.role');
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
});

    Route::get('/base', function () {
        return view('base');
    });

    Route::get('/covoiturage', function () {
        return view('covoiturage');
});