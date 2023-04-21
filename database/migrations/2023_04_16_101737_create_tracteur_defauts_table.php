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
        Schema::create('tracteur_defauts', function (Blueprint $table) {
            $table->id();
            $table->text('interieur');
            $table->text('exterieur');
            $table->text('autre');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('tracteur_id')->nullable()->constrained();
            $table->boolean('valider')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracteur_defauts');
    }
};
