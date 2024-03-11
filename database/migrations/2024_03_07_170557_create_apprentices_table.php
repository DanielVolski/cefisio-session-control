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
        Schema::create('apprentices', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->nullable(false)->unique();
            $table->unsignedBigInteger('supervisor_id')->nullable(false)->unique();
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('supervisor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprentices');
    }
};