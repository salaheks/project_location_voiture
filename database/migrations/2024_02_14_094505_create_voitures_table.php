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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation', 191);
			$table->date('date_mise')->nullable();
			$table->boolean('climatisation')->default(0);
			$table->boolean('airbag')->default(0);
			$table->integer('nombre_porte')->nullable();
			$table->integer('nombre_passager')->nullable();
			$table->float('prix_achat', 10, 0)->nullable();
			$table->boolean('credit')->default(0);
			$table->float('avance_credit', 10, 0)->nullable();
			$table->integer('duree_credit_mois')->nullable();
			$table->string('mode_reglement')->nullable();
			$table->float('montant_paiement_par_mois', 10, 0)->nullable();
			$table->date('date_debut_paiement')->nullable();
			$table->string('couleur', 191);
			$table->string('categorie', 191);
			$table->string('capacite_bagage')->nullable();
			$table->integer('km_premier_vidange')->nullable();
			$table->integer('km_premier_chaine_distribution')->nullable();
			$table->integer('km_premier_pneu')->nullable();
			$table->date('date_premiere_visite')->nullable();
			$table->text('image')->nullable();
            $table->foreignId('type_id')->nullable()->constrained('types')->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
