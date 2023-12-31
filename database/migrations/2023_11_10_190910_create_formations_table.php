<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('titre');
            $table->text('description');
            $table->string('niveau');
            $table->timestamps(); // Ajoute automatiquement les colonnes created_at et updated_at

            // ... Autres colonnes si nécessaire
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
