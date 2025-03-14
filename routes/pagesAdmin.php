<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {

    Route::get('admin/userCreation/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('admin/userCreation/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('admin/userCreation/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('admin/usercreation/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::get('/dashboard', function() {
    return view('dashboard');
});
Route::get('/get-covoiturage-stats', [DashboardAdminController::class, 'getCovoiturageStats']);
Route::get('/get-credit-stats', [DashboardAdminController::class, 'getCreditStats']);

