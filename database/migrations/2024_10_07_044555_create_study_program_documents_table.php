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
        Schema::create('study_program_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akreditasi_study_program_id')->constrained('akreditasi_study_programs')->onDelete('cascade');
            $table->string('name');
            $table->string('category');
            $table->string('sertificate');
            $table->string('period');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_program_documents');
    }
};
