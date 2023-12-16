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
            $table->bigIncrements('id')->uniqid();
            $table->unsignedBigInteger('supervisor_id')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('name', 80)->nullable(false);
            $table->string('password')->nullable(false);
            $table->timestamps();
            $table->unique('email');
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
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
