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
        Schema::create('imagerecords', function (Blueprint $table) {
            $table->id(); // ID da imagem
            $table->foreignId('artifact_id'); // ID da peça associada
            $table->string('location', 255); // Localização da imagem
            $table->string('type', 50)->nullable(); // Tipo de imagem (opcional)
            $table->string('author', 100)->nullable(); // Autor da imagem (opcional)
            $table->date('date'); // Data da imagem
            $table->timestamp('added_at')->nullable(); // Data de adição
            $table->timestamps(); // created_at e updated_at automáticos
            $table->boolean('active')->default(false); // Ativo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagerecords');
    }
};
