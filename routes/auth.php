<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Routes accessibles aux invités seulement
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::post('/upload', [RegisteredUserController::class, 'store'])->name('upload.image')->middleware('image.upload');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Routes protégées (authentification requise)
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Redirections selon le rôle
    Route::middleware('Role:ROLE_ADMIN')->group(function () {
        Route::get('/admin/menuAdmin', function () {
            return view('Menu-admin');
        })->name('admin.menu-admin');
    });

    Route::middleware('Role:ROLE_EMPLOYE')->group(function () {
        Route::get('/employee/menuEmployee', function () {
            return view('Menu-employee');
        })->name('employee.menu-employee');
    });

    Route::middleware('Role:ROLE_CONDUCTEUR,Role:ROLE_PASSAGER,Role:ROLE_USER')->group(function () {
        Route::get('/customerUser/menuCustomer', function () {
            return view('menu-customer');
        })->name('customerUser.menu-customer');
    });
});
