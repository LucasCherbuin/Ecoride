<?php
use App\Http\Controllers\CovoiturageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RoleChoiceController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::middleware(['auth', 'role:ROLE_USER'])->group(function () {
    Route::post('/choisir-role', [RoleChoiceController::class, 'choisirRole'])->name('choisir.role');
    Route::post('/upload', [RegisteredUserController::class, 'store'])->name('upload.image')->middleware('image.upload');
});

Route::middleware(['auth', 'role:ROLE_CONDUCTEUR|ROLE_CHAUFFEURPASSAGER'])->group(function () {
    Route::get('/covoiturage/create', [CovoiturageController::class, 'create'])->name('covoiturage.create');
    Route::post('/covoiturage/store', [CovoiturageController::class, 'store'])->name('covoiturage.store');
    Route::get('/covoiturageDemmarage', [CovoiturageController::class, 'changerStatut']);
    Route::put('/covoiturageDemmarage/{id}/changer-statut', [CovoiturageController::class, 'changerStatut']);
});

Route::middleware(['auth', 'role:ROLE_CONDUCTEUR|ROLE_CHAUFFEURPASSAGER|ROLE_PASSAGER'])->group(function () {
    Route::patch('/historique', [StatusController::class, 'updateStatus']);
    Route::patch('/historique/{id}/status', [StatusController::class, 'updateStatus']);
});

Route::middleware(['auth', 'role:ROLE_CHAUFFEURPASSAGER|ROLE_PASSAGER'])->group(function () {
    Route::patch('/avis', [AvisController::class, 'updateStatus']);
    Route::patch('/avis/{id}/status', [AvisController::class, 'updateStatus']);
});