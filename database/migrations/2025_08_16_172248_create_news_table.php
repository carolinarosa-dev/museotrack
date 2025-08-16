<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('conteudo');
            $table->string('autor');
            $table->date('data_publicacao');
            $table->boolean('publicado')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('news');
    }
};
