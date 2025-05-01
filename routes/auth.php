<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);


    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);



Route::post('/submit', function () {
    return 'Formulaire soumis avec succès !';
})->middleware('custom.csrf');


// Routes protégées (authentification requise)
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Redirections selon le rôle
    Route::middleware(['auth', 'role:ROLE_ADMIN'])->group(function () {
        Route::get('/admin/menuAdmin', function () {
            return view('MenuAdmin');
        })->name('admin.menuAdmin');
    });

    Route::middleware(['auth', 'role:ROLE_EMPLOYE'])->group(function () {
        Route::get('/employee/menuEmployee', function () {
            return view('MenuEmployee');
        })->name('employee.menuEmployee');
    });

    Route::middleware(['auth', 'role:ROLE_CONDUCTEUR|ROLE_PASSAGER|ROLE_USER|ROLE_CHAUFFEURPASSAGER'])->group(function () {
        Route::get('/customerUser/menuCustomer', function () {
            return view('customerUser.menuCustomer');
        })->name('customerUser.menuCustomer');

    });

});
