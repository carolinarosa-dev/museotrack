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
        Schema::create('autores', function (Blueprint $table) {
            $table->increments('idAutor');
            $table->foreignId('idPeca');
            $table->foreignId('idImagem');
            $table->string('nomeAutor',150);
            $table->date('dataNascimento');
            $table->string('naturalidade',150);
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
        Schema::dropIfExists('autores');
    }
};
