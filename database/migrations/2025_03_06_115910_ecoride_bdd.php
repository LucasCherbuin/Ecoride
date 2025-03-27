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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
            $table->timestamps();
        });

        Schema::create('modeles', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->string('marque');
            $table->string('couleur');
            $table->integer('nombres_places')->default(0);
            $table->string('energie');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo')->unique();
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('credit')->default(0);
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->boolean('fumeur')->default(false);
            $table->boolean('animal')->default(false);
            $table->text('detail')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('conducteurs', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation', 10)->unique();
            $table->string('energie', 20);
            $table->date('date_immatriculation');
            $table->foreignId('modele_id')->constrained('modeles')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('covoiturages', function (Blueprint $table) {
            $table->id();
            $table->string('depart');
            $table->string('arrivee');
            $table->date('date');
            $table->time('heure_depart');
            $table->time('heure_arrive');
            $table->int('prix');
            $table->boolean('ecologique')->default(false);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('conducteur_id')->constrained('conducteurs')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->integer('note')->default(18);
            $table->text('commentaire');
            $table->boolean('valid')->default(false);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('covoiturage_id')->constrained('covoiturages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
        Schema::dropIfExists('covoiturages');
        Schema::dropIfExists('conducteurs');
        Schema::dropIfExists('preferences');
        Schema::dropIfExists('users');
        Schema::dropIfExists('modeles');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('roles');
    }
};
