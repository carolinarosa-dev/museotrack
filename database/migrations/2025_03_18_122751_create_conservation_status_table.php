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
        Schema::create('conservationstatus', function (Blueprint $table) {
            $table->id(); // Cria automaticamente a chave primária
            $table->foreignId('artifact_id')->constrained('artifacts'); // Mantendo consistência nos nomes das tabelas
            $table->string('status', 50);
            $table->text('specifications')->nullable();
            $table->date('date');
            $table->timestamp('added_at')->nullable();
            $table->timestamps(); // Já inclui created_at e updated_at automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conservationstatus');
    }
};
