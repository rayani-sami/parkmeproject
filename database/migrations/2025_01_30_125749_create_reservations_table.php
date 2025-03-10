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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // Colonne `id` (clé primaire)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers `users`
            $table->foreignId('place_id')->constrained()->onDelete('cascade'); // Clé étrangère vers `places`
            $table->dateTime('start_time'); // Heure de début de la réservation
            $table->dateTime('end_time'); // Heure de fin de la réservation
            $table->enum('status', ['active', 'canceled', 'completed'])->default('active'); // Statut de la réservation
            $table->timestamps(); // Colonnes `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
