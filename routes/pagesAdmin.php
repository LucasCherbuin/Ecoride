<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredEmployeController;

Route::middleware(['auth', 'role:ROLE_ADMIN'])->group(function () {

    Route::get('admin/userCreation/', [ProfileController::class, 'index'])->name('admin.userCreation.index');
    Route::get('admin/userCreation/create', [RegisteredEmployeController::class, 'createEmploye'])->name('admin.userCreation.create');
    Route::post('admin/userCreation/create', [RegisteredEmployeController::class, 'storeEmploye'])->name('admin.userCreation.store');
    Route::get('admin/userCreation/{id}/edit', [ProfileController::class, 'edit'])->name('admin.userCreation.edit');
    Route::delete('admin/userCreation/{id}', [ProfileController::class, 'destroy'])->name('admin.userCreation.destroy');

    // Routes pour le dashboard
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/get-covoiturage-stats', [DashboardAdminController::class, 'getCovoiturageStats']);
    Route::get('/admin/dashboard/get-credit-stats', [DashboardAdminController::class, 'getCreditStats']);


});



