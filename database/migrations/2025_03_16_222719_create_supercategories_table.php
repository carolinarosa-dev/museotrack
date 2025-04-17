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
        Schema::create('supercategories', function (Blueprint $table) {
            $table->id(); // ID da super categoria
            $table->string('name'); // Designação
            $table->text('description'); // Designação
            $table->boolean('active')->default(false); // Designação
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supercategories');
    }
};
