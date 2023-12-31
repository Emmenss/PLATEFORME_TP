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
      
        Schema::create('exercices', function (Blueprint $table) {
            $table->id();
            $table->text('enonce');
            // Ajoutez d'autres colonnes si nécessaire
            $table->unsignedBigInteger('chapitre_id');
            $table->timestamps();
        
            $table->foreign('chapitre_id')->references('id')->on('chapitres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercices');
    }
};
