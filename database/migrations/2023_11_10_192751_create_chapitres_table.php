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
        Schema::create('chapitres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->unsignedBigInteger('formation_id');
            $table->timestamps();

            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapitres');
    }
};
