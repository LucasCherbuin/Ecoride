<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/choisir-role', [RoleChoiceController::class, 'choisirRole'])->name('choisir.role');
});