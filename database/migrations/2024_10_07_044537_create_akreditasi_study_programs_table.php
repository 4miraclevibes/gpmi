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
        Schema::create('akreditasi_study_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akreditasi_department_id')->constrained('akreditasi_departments')->onDelete('cascade');
            $table->string('name');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasi_study_programs');
    }
};
