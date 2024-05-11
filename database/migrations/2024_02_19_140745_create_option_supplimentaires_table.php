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
        Schema::create('option_supplimentaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 191)->nullable();
            $table->string('type_paiement', 191)->nullable();
            $table->float('prix', 10, 0)->nullable();
            $table->integer('quantite')->nullable();
            $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_supplimentaires');
    }
};
