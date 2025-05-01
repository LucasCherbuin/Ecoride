<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleChoiceController;
use App\Http\Controllers\CovoiturageController;
use App\Http\Components\Annonce;
use Livewire\Livewire;
use App\Http\Controllers\RechercheCovoiturageController;
use App\Http\Livewire\RechercheCovoiturage;


    require base_path('routes/auth.php');
    require base_path('routes/pageCustomer.php');
    require base_path('routes/pageEmployee.php');
    require base_path('routes/pagesAdmin.php');


        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/contact', [ContactController::class, 'create'])->name('contact.form');
        Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

        Route::get('/base', function () {
            return view('base');
        });

        Route::get('/covoiturage', [RechercheCovoiturageController::class, 'itineraire'])->name('covoiturage.search');
        Route::get('/annonce/{id}', [CovoiturageController::class, 'show'])->name('covoiturage.show');
        Route::post('/reservation-choice', [RechercheCovoiturageController::class, 'handleChoice'])->name('reservation.choice');
        Route::post('/annonce/reservation/{nombresPlaces}', [RechercheCovoiturageController::class, 'reserver']);

