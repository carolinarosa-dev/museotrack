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
        Schema::create('image_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artefact_id')->constrained('artefacts');
            $table->foreignId('type_id')->nullable()->constrained('image_types');
            $table->date('date')->nullable();
            $table->string('location')->nullable();
            $table->foreignId('author_id')->nullable()->constrained('authors');
            $table->json('photos')->nullable();
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
        Schema::dropIfExists('image_records');
    }
};
