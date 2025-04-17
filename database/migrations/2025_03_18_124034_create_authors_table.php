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
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // Laravel já cria um campo 'id' automaticamente como chave primária
            $table->foreignId('artifact_id')->constrained('artifacts')->onDelete('cascade'); // Referência à peça
            //$table->foreignId('image_id')->constrained('images')->onDelete('cascade'); // Referência à imagem
            $table->string('name', 150); // Nome do autor
            $table->date('birth_date')->nullable(); // Data de nascimento
            $table->string('birthplace', 150)->nullable(); // Naturalidade
            $table->timestamp('added_at')->nullable();
            $table->timestamps(); // Criado e atualizado automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
