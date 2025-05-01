<?php
use App\Http\Controllers\CovoiturageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\startRideController;
use App\Http\Controllers\RoleChoiceController;

Route::middleware(['auth', 'role:ROLE_CONDUCTEUR|ROLE_CHAUFFEURPASSAGER'])->group(function () {
    Route::resource('covoiturage', CovoiturageController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);


Route::get('user/covoiturageDemmarage', [startRideController::class, 'changerStatut']);
Route::put('user/covoiturageDemmarage/{id}/changer-statut', [startRideController::class, 'changerStatut']);
Route::post('user/choisir-role', [RoleChoiceController::class, 'choisirRole'])->name('choisir.role');

});
