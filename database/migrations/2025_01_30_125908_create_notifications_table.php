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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Colonne `id` (clé primaire)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers `users`
            $table->text('message'); // Contenu de la notification
            $table->enum('type', ['reservation', 'payment', 'reminder']); // Type de notification
            $table->boolean('is_read')->default(false); // Statut de lecture
            $table->timestamps(); // Colonnes `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
