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
        Schema::create('study_area_accompaniments', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->timestamps();
            $table->foreignUuid('study_area_id')->nullable(false)
                ->constrained()->cascadeOnDelete();
            $table->string('value', 500)->nullable(false);
            $table->string('type')->nullable(false); //eg. general_requirement || professional_requirement || intern_responsibility.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_area_accompaniments');
    }
};
