<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::middleware('auth')->group(function () {
        Route::get('/admin/profil', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/admin/profil', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/admin/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/Menu-admin', function () {
            return view('Menu-admin');
        });
    });


    Route::middleware(['auth', 'role:employee'])->group(function () {
        Route::get('/employee/Menu-employee', function () {
            return view('Menu-employee');
        });
    });

    Route::middleware(['auth', 'role:conducteur', 'role:passager', 'role:user'])->group(function () {
        Route::get('/user/Menu-utilisateur', function () {
            return view('Menu-utilisateur');
        });
    });


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
