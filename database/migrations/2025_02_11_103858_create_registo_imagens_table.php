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
        Schema::create('registo_imagens', function (Blueprint $table) {
            $table->increments('idImagem');
            $table->foreignId('idPeca');
            $table->string('localizacao',255);
            $table->string('tipo',50)->nullable();
            $table->string('autor',100)->nullable();
            $table->date('datacao');
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
        Schema::dropIfExists('registo_imagens');
    }
};
