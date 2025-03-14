<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;


Route::get('/dashboard', function() {
    return view('dashboard');
});
Route::get('/get-covoiturage-stats', [DashboardAdminController::class, 'getCovoiturageStats']);
Route::get('/get-credit-stats', [DashboardAdminController::class, 'getCreditStats']);