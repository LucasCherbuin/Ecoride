<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Livewire\RechercheCovoiturage;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/contact', [ContactController::class, 'create'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/base', function () {
    return view('base');
});

Route::get('/covoiturage', function () {
    return view('covoiturage');
});
=======
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('Menu-admin');
    });
});


Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee', function () {
        return view('Menu-employee');
    });
});

Route::middleware(['auth', 'role:conducteur', 'role:passager', 'role:user'])->group(function () {
    Route::get('/user', function () {
        return view('Menu-utilisateur');
    });
});


require __DIR__.'/auth.php';
>>>>>>> features/loginRegister
