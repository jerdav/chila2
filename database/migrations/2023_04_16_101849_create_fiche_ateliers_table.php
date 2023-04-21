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
        Schema::create('fiche_ateliers', function (Blueprint $table) {
            $table->id();
            $table->string('ahd');
            $table->string('phd');
            $table->string('ahf');
            $table->string('phf');
            $table->foreignId('user_id')->constrained();
            $table->boolean('valider')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_ateliers');
    }
};
