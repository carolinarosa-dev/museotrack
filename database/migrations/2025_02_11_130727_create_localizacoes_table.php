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
        Schema::create('localizacoes', function (Blueprint $table) {
            $table->increments('idLocal');
            $table->foreignId('idPeca') ->references('idPeca')->on('museus');
            $table->string('codigopostal',20);
            $table->string('rua',100);
            $table->integer('numero',10);
            $table->string('localidade',50);
            $table->timestamp('added_at', 0) -> nullable();
            $table->timestamps('created_at');
            $table->timestamps('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizacoes');
    }
};
