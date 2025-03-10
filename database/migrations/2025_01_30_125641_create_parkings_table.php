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
        Schema::create('parkings', function (Blueprint $table) {
            $table->id(); // Colonne `id` (clé primaire)
            $table->string('name'); // Nom du parking
            $table->string('address'); // Adresse du parking
            $table->integer('total_spaces'); // Nombre total de places
            $table->integer('available_spaces'); // Nombre de places disponibles
            $table->timestamps(); // Colonnes `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkings');
    }
};
