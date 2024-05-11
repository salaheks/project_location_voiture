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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('capital')->nullable();
            $table->string('tp')->nullable();
            $table->string('rc')->nullable();
            $table->string('idf')->nullable();
            $table->string('ice')->nullable();
            $table->string('address')->nullable();
            $table->string('rib')->nullable();
            $table->string('swift')->nullable();
            $table->string('url')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('directorphone');
            $table->string('logo')->nullable();
            $table->float('franchise')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
