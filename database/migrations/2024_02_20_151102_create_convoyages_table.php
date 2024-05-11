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
        Schema::create('convoyages', function (Blueprint $table) {
            $table->id();
            $table->string('ville')->nullable();
            $table->double('prix_mad_ville_livraison', 8, 2)->nullable();
            $table->double('prix_mad_ville_retour', 8, 2)->nullable();
            $table->double('prix_euro_ville_livraison', 8, 2)->nullable();
            $table->double('prix_euro_ville_retour', 8, 2)->nullable();
            $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convoyages');
    }
};
