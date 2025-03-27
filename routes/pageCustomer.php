<?php
use App\Http\Controllers\CovoiturageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;

Route::get('/covoiturage/create', [CovoiturageController::class, 'create'])->name('covoiturage.create');
Route::post('/covoiturage/store', [CovoiturageController::class, 'store'])->name('covoiturage.store');

Route::patch('/historique', [StatusController::class, 'updateStatus']);
Route::patch('/historique/{id}/status', [StatusController::class, 'updateStatus']);

Route::get('/covoiturageDemmarage', [CovoiturageController::class, 'changerStatut']);
Route::put('/covoiturageDemmarage/{id}/changer-statut', [CovoiturageController::class, 'changerStatut']);

Route::middleware('role:ROLE_CONDUCTEUR,ROLE_PASSAGER,ROLE_USER')->group(function () {
    Route::get('/customerUser/menuCustomer', function () {
        return view('menu-customer');
    })->name('customerUser.menu-customer');
});


