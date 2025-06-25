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
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id(); // ID da dimensão
            $table->foreignId('artifact_id')->constrained('artifacts'); // Chave estrangeira para a peça (artifacts)
            $table->float('length', 10)->nullable();
            $table->float('width', 10)->nullable();
            $table->float('height', 10)->nullable();
            $table->float('depth', 10)->nullable();
            $table->float('capacity', 10)->nullable();
            $table->float('diameter', 10)->nullable();
            $table->float('thickness', 10)->nullable();
            $table->text('other_relevant_data')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->boolean('active')->default(false); // Ativo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dimensions');
    }
};
