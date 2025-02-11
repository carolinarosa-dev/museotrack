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
        Schema::create('estado_conservacao', function (Blueprint $table) {
            $table->increments('idEstado');
            $table->foreignId('idPeca')->constrained('museus');
            $table->string('estado',50);
            $table->text('especificacoes')->nullable();
            $table->date('data');
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
        Schema::dropIfExists('estado_conservacao');
    }
};
