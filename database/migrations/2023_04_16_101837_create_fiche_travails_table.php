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
        Schema::create('fiche_travails', function (Blueprint $table) {
            $table->id();
            $table->json('oil')->nullable();
            $table->json('adb')->nullable();
            $table->json('netpl')->nullable();
            $table->json('netsemi')->nullable();
            $table->string('repar')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('remorque_id')->constrained();
            $table->foreignId('tracteur_id')->constrained();
            $table->boolean('valider')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_travails');
    }
};
