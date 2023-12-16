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
        Schema::create('supervisors', function (Blueprint $table) {
            $table->bigIncrements('id')->uniqid();
            $table->unsignedBigInteger('secretarian_id');
            $table->string('email')->nullable(false);
            $table->string('name', 80)->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('specialty', 20)->nullable(false);
            $table->timestamps();
            $table->unique('email');
            $table->foreign('secretarian_id')->references('id')->on('secretarians');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisors');
    }
};
