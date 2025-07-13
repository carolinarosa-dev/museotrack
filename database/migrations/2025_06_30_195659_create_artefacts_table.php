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
        Schema::create('artefacts', function (Blueprint $table) {
            $table->id();
            $table->json('photos')->nullable();
            $table->string('reference');
            $table->string('denomination');
            $table->string('dating')->nullable();
            $table->text('description')->nullable();
            $table->text('origin')->nullable();
            $table->text('bibliography')->nullable();
            $table->date('incorporation_date')->nullable();
            $table->foreignId('incorporation_mode_id')->nullable()->constrained('incorporation_modes');
            $table->foreignId('conservation_records_id')->nullable();
        /*    $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');*/

            // Auditoria
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artefacts');
    }
};
