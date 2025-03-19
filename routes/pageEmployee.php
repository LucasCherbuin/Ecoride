<?php
use App\Http\Controllers\CovoiturageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\ReviewController;

Route::middleware(['auth'])->group(function () {
    Route::get('/employee/reviews', [ValidationController::class, 'index'])->name('reviews.index');
    Route::post('/employee/reviews/{id}/approve', [ValidationController::class, 'validateReview'])->name('reviews.approve');
    Route::post('/employee/reviews/{id}/reject', [ValidationController::class, 'rejectReview'])->name('reviews.reject');
});
