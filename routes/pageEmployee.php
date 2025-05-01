<?php
use App\Http\Controllers\CovoiturageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\ReviewController;

Route::middleware(['auth', 'role:ROLE_EMPLOYE'])->group(function () {
    Route::get('/employee/avis', [ValidationController::class, 'index'])->name('reviews.index');
    Route::post('/employee/avis/{id}/approve', [ValidationController::class, 'validateReview'])->name('reviews.approve');
    Route::post('/employee/avis/{id}/reject', [ValidationController::class, 'rejectReview'])->name('reviews.reject');
});
