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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Colonne `id` (clé primaire)
            $table->foreignId('reservation_id')->constrained()->onDelete('cascade'); // Clé étrangère vers `reservations`
            $table->decimal('amount', 10, 2); // Montant du paiement
            $table->string('payment_method'); // Méthode de paiement
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Statut du paiement
            $table->string('transaction_id')->nullable(); // Identifiant de la transaction
            $table->timestamps(); // Colonnes `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
