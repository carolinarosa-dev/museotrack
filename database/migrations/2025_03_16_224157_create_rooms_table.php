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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // ID da sala
            $table->foreignId('artifact_id')->constrained('artifacts'); // Chave estrangeira para a peça
            $table->string('name', 50); // 'designacao' traduzido para 'name'
            $table->timestamp('added_at')->nullable();
            $table->timestamps(); // Já inclui created_at e updated_at automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
