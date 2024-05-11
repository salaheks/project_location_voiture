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
        Schema::create('vidanges', function (Blueprint $table) {
            $table->id();
            $table->integer('km_debut');
            $table->string('type_huile')->nullable();
            $table->string('mode_reglement')->nullable();
            $table->date('date_changement');
            $table->float('prix', 10, 0);
            $table->boolean('filtre_huile')->nullable();
            $table->boolean('filtre_air')->nullable();
            $table->boolean('filtre_gazoil')->nullable();
            $table->float('km_vidange')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('voiture_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vidanges');
    }
};
