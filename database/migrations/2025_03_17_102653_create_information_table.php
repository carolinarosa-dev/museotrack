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
        Schema::create('information', function (Blueprint $table) {
            $table->id(); // Cria a chave primária automaticamente
            $table->text('description')->nullable();
            $table->text('origin')->nullable();
            $table->text('observations')->nullable();
            $table->text('history')->nullable();
            $table->text('bibliography')->nullable();
            $table->timestamp('added_at')->nullable();
            $table->timestamps(); // Já inclui created_at e updated_at automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
