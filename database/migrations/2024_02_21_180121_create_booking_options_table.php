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
        Schema::create('booking_options', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->string('type');
            $table->double('price', 8, 2)->default(0);
            $table->double('amount', 8, 2)->default(0);
            $table->foreignId('option_supplimentaire_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('booking_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_options');
    }
};
