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
        Schema::table('parkings', function (Blueprint $table) {
            $table->decimal('latitude', 10, 8)->nullable()->after('available_spaces'); // Ajoute latitude
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude'); // Ajoute longitude
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parkings', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']); // Supprime les colonnes si rollback
        });
    }
};
