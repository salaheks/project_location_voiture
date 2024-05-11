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
        Schema::create('credit_paiements', function (Blueprint $table) {
            $table->id();
            $table->date('date_paiement');
            $table->date('date_reglement')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(0);
            $table->float('montant');
            $table->foreignId('voiture_id')->constrained('voitures')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_paiements');
    }
};
