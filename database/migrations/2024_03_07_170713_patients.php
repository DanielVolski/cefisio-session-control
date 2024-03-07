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
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false)->unique();
            $table->unsignedBigInteger('secretarian_id')->unique();
            $table->string('name', 80)->nullable(false);
            $table->string('cpf', 14)->nullable(false);
            $table->string('medical_record', 20)->nullable();
            $table->string('referral_slip', 5)->nullable();
            $table->timestamps();
            $table->foreign('secretarian_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};