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
        Schema::create('artifacts', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->foreignId('super_category_id')->nullable(); // ID da super categoria
            $table->foreignId('author_id')->nullable(); // ID do autor
            $table->string('category', 100)->nullable();
            $table->string('name', 100); // Denominaçao
            $table->string('image', 100); // Imagem
            $table->string('history', 100); // Historial
            $table->string('technique', 100)->nullable();
            $table->string('workshop_or_manufacturer', 100); // Oficina/Fabricante
            $table->string('material', 100);
            $table->date('dating'); // Datação
            $table->timestamp('added_at')->nullable();
            $table->boolean('active')->default(false); // Ativo
            $table->timestamps(); // Criará automaticamente created_at e updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artifacts');
    }
};
