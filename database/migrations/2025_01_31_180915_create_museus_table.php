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
        Schema::create('museus', function (Blueprint $table) {
          //  $table->id();
            $table->increments('idPeca');
            $table->foreignId('idSuperCategoria')->nullable();
            $table->foreignId('idAutor')->nullable();
            $table->string('categoria',100) -> nullable();
            $table->string('denominacao',100);
            $table->string('tecnica',100) -> nullable();
            $table->string('oficina/fabricante',100);
            $table->string('materia',100);
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
        Schema::dropIfExists('museus');
    }
};
