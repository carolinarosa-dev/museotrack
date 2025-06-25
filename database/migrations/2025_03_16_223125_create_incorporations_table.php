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
        Schema::create('incorporations', function (Blueprint $table) {
            $table->id(); // ID da incorporação
            $table->foreignId('artifact_id')->constrained('artifacts'); // Chave estrangeira para a peça (artifacts)
            $table->date('date'); // Data da incorporação
            $table->boolean('active')->default(false); // Ativo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incorporations');
    }
};
