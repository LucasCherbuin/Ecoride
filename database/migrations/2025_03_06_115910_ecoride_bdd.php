<?php

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
        // Création des tables indépendantes en premier
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
            $table->timestamps();
        });

        Schema::create('modele', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->string('marque');
            $table->string('couleur');
            $table->integer('nombres_places')->default(0);
            $table->string('energie');
            $table->timestamps();
        });

        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo')->unique();
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('credit')->default(0);
            $table->foreignId('role_id')->constrained('role')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('preference', function (Blueprint $table) {
            $table->id();
            $table->boolean('fumeur')->default(false);
            $table->boolean('animal')->default(false);
            $table->text('detail')->nullable();
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('conducteur', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation', 10)->unique();
            $table->date('date_immatriculation');
            $table->foreignId('modele_id')->constrained('modele')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            $table->timestamps();
        });



        Schema::create('covoiturage', function (Blueprint $table) {
            $table->id();
            $table->string('depart');
            $table->string('arrivee');
            $table->date('date');
            $table->time('heure_depart');
            $table->time('heure_arrive');
            $table->integer('prix');
            $table->boolean('ecologique')->default(false);
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('conducteur_id')->constrained('conducteur')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('status')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->integer('note')->default(18);
            $table->text('commentaire');
            $table->boolean('valid')->default(false);
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('covoiturage_id')->constrained('covoiturage')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};

