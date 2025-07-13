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
        Schema::create('artefact_dimensions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artefact_id')->constrained('artefacts');
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('depth', 8, 2)->nullable();
            $table->decimal('thickness', 8, 2)->nullable();
            $table->decimal('diameter', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('capacity', 8, 2)->nullable();
            $table->text('other_data')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artefact_dimensions');
    }
};
