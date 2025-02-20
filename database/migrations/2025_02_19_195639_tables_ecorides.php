<?php

use App\Models\conducteur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Avis', function (Blueprint $table) {
            $table->id();
            $table->integer('note')->default(18);
            $table->text('commentaire');
            $table->boolean('valid')->default(false);
            $table->foreignId('user_id');
            $table->foreingId('covoiturage_id');
        });

        Schema::create('Conducteur', function (Blueprint $table) {
            $table->id();
            $table->tinyText('immatriculation');
            $table->tinyText('energie');
            $table->date('date immatriculation');
            $table->integer('nombres places')->default(0);
            $table->foreignId('modele_id');
        });

        Schema::create('Covoiturage', function (Blueprint $table) {
            $table->id();
            $table->Text('depart');
            $table->Text('arrive');
            $table->date('date');
            $table->time('heure');
            $table->boolean('Ecolologique')->default(0);
            $table->dateTime('creation');
            $table->foreignId('user_id');
            $table->foreignId('conducteur_id');
            $table->foreignId('status_id');
        });

        Schema::create('Status', function (Blueprint $table) {
            $table->tinyText('En prévision')->default('en prévision');
            $table->tinyText('en cours')->default('en cours');
            $table->tinyText('annulé')->default('annulé');
        });

        Schema::create('Modele', function (Blueprint $table) {
            $table->id();
            $table->tinyText('modele');
            $table->tinyText('marque');
            $table->tinyText('couleur');
            $table->boolean('energieVerte')->default('non');
            $table->foreignId('user_id');
        });

        Schema::create('Role', function (Blueprint $table) {
            $table->id();
            $table->tinyText('label');
        });

        Schema::create('Preference', function (Blueprint $table) {
            $table->id();
            $table->boolean('fumeur')->default('non');
            $table->boolean('animal')->default('non');
            $table->text('detail');
            $table->foreignId('user_id');
        });

        Schema::create('User', function (Blueprint $table) {
            $table->id();
            $table->tinyText('pseudo');
            $table->tinyText('email');
            $table->tinyText('password');
            $table->integer('credit');
            $table->foreignId('role_id');
            $table->foreignId('avis_id');
            $table->foreignId('covoiturage_id');
            $table->foreignId('user_id');
        });


    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
