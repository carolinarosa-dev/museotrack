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
        Schema::create('informacoes', function (Blueprint $table) {
            $table->increments('idInfo');
            $table->text('descricao')->nullable();
            $table->text('origem')->nullable();
            $table->text('observacoes')->nullable();
            $table->text('historico')->nullable();
            $table->text('bibliografia')->nullable();
            $table->timestamp('added_at', 0) -> nullable();
            $table->timestamps('created_at');
            $table->timestamps('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacoes');
    }
};
