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
        Schema::create('learner_formations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('learner_id');
            $table->unsignedBigInteger('formation_id');
            $table->timestamps();

            $table->foreign('learner_id')->references('id')->on('learners')->onDelete('cascade');
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learner_formations');
    }
};
