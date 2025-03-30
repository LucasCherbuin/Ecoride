<?php
use App\Http\Controllers\CovoiturageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\startRideController;

Route::get('user/covoiturage/create', [CovoiturageController::class, 'create'])->name('covoiturage.create');
Route::post('user/covoiturage/store', [CovoiturageController::class, 'store'])->name('covoiturage.store');

Route::get('user/historique', [StatusController::class, 'updateStatus']);
Route::patch('user/historique/{id}/delete', [StatusController::class, 'deleteStatus']);

Route::get('user/covoiturageDemmarage', [startRideController::class, 'changerStatut']);
Route::put('user/covoiturageDemmarage/{id}/changer-statut', [startRideController::class, 'changerStatut']);

Route::middleware('role:ROLE_CONDUCTEUR,ROLE_PASSAGER,ROLE_USER')->group(function () {
    Route::get('/customerUser/menuCustomer', function () {
        return view('menu-customer');
    })->name('customerUser.menu-customer');
});


