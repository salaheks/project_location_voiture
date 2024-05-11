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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 191);
            $table->date('date_naissance')->nullable();
            $table->string('adresse', 191)->nullable();
            $table->string('permis', 191)->nullable();
            $table->date('date_delivration_permis')->nullable();
            $table->string('cin', 191)->nullable();
            $table->string('num_passeport', 191)->nullable();
            $table->date('date_delivration_passeport')->nullable();
            $table->string('image_permis')->nullable();
            $table->string('image_passport')->nullable();
            $table->string('telephone', 191)->nullable();
            $table->string('email')->nullable();
            $table->boolean('isCompany')->default(false);
            $table->string('ice')->nullable();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('clients');
    }
};
