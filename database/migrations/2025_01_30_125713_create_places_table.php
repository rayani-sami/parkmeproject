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
        Schema::create('places', function (Blueprint $table) {
            $table->id(); // Colonne `id` (clé primaire)
            $table->foreignId('parking_id')->constrained()->onDelete('cascade'); // Clé étrangère vers `parkings`
            $table->string('number'); // Numéro de la place
            $table->boolean('is_available')->default(true); // Statut de disponibilité
            $table->timestamps(); // Colonnes `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
