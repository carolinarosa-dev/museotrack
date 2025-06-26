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
            $table->foreignId('author_id')->nullable();
            $table->string('reference',9)->nullable(); // ID do autor
            $table->string('category')->nullable();
            $table->string('name')->nullable(); // Denominaçao
            $table->string('image')->nullable(); // Imagem
            $table->string('history')->nullable(); // Historial
            $table->string('technique')->nullable();
            $table->string('workshop_or_manufacturer')->nullable(); // Oficina/Fabricante
            $table->string('material')->nullable();
            $table->date('dating')->nullable()->change(); // Datação
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
