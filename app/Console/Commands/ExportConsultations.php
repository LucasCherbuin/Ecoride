<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CovoiturageDonnees;
use App\Models\CreditGagneDonnees;
use Illuminate\Support\Facades\Storage;

class ExportConsultations extends Command
{
    protected $signature = 'export:consultations';
    protected $description = 'Export des consultations MongoDB locales en JSON';

    public function handle()
    {
        $consultationsCovoiturage = CovoiturageDonnees::all();
        $json = $consultationsCovoiturage->toJson(JSON_PRETTY_PRINT);

        $consultationsCredit = CreditGagneDonnees::all();
        $json = $consultationsCredit->toJson(JSON_PRETTY_PRINT);

        Storage::disk('local')->put('exports/consultations.json', $json);

        $this->info('Consultations exportées dans storage/app/exports/consultations.json');
    }
}

