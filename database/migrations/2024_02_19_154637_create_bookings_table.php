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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('num_ref')->nullable()->unique();
            $table->foreignId('voiture_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('driver_id')->nullable()->constrained('clients')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('set null');
            $table->string('contract_num', 30)->nullable();
            $table->string('adresse_livraison')->nullable();
            $table->string('adresse_retour')->nullable();
            $table->float('prix_location', 10, 0)->nullable();
            $table->float('prix_accessoires', 10, 0)->nullable();
            $table->float('prix_franchise', 10, 0)->nullable();
            $table->float('total', 10, 0)->nullable();
            $table->float('avance', 10, 0)->nullable();
            $table->string('mode_reglement_pickup')->nullable();
            $table->string('mode_reglement_dropoff')->nullable();
            $table->dateTime('date_livraison')->nullable();
            $table->dateTime('date_retour')->nullable();
            $table->integer('nbr_jour')->nullable();
            $table->string('nombreKmPickUp')->nullable();
            $table->string('nombreKmDropOff')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
