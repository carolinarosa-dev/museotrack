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
        Schema::create('dimensoes', function (Blueprint $table) {
            $table->increments('idDimensao');
            $table->foreignId('idPeca') ->references('idPeca')->on('museus');
            $table->float('comprimento',10)->nullable();
            $table->float('largura',10)->nullable();
            $table->float('altura',10)->nullable();
            $table->float('profundidade',10)->nullable();
            $table->float('capacidade',10)->nullable();
            $table->float('diametro',10)->nullable();
            $table->float('espessura',10)->nullable();
            $table->text('outrosdadosrelevantes')->nullable();


            $table->string('nome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dimensoes');
    }
};
