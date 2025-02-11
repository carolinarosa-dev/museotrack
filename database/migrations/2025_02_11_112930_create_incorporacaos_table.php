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
        Schema::create('incorporacaos', function (Blueprint $table) {
            $table->increments('idIncorporado');
            $table->foreignId('idPeca')->references('idPeca')->on('museus');
            $table->date('data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incorporacaos');
    }
};
