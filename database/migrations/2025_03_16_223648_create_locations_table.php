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
        Schema::create('locations', function (Blueprint $table) {
            $table->id(); // ID da localização
            $table->foreignId('artifact_id')->constrained('artifacts'); // Chave estrangeira para a peça (artifacts)
            $table->string('postal_code', 20);
            $table->string('street', 100);
            $table->integer('number'); // Removido o segundo parâmetro, pois `integer` não aceita tamanho
            $table->string('city', 50);
            $table->timestamp('added_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
