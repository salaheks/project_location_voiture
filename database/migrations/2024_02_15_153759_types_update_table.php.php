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
        Schema::table('types', function (Blueprint $table) {
            $table->string('marque', 100)->change();
            $table->string('model', 100)->change();
            $table->string('transmission', 50)->change();
            $table->string('carburant', 50)->change();

            // Add the unique constraint
            $table->unique(['marque', 'model', 'transmission', 'carburant']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('types', function (Blueprint $table) {
            // Remove the unique constraint
            $table->dropUnique(['marque', 'model', 'transmission', 'carburant']);
        });
    }
};

