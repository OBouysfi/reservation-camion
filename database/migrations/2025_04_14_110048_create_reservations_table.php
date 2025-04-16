<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('numero_camion');
            $table->string('chauffeur');
            $table->enum('status', ['En attente', 'Confirmée', 'Annulée'])->default('En attente');
            $table->enum('type_camion', ['Plateau', 'Rideau coulissant']);
            $table->timestamp('arrivee_prevue');
            $table->timestamps();
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
