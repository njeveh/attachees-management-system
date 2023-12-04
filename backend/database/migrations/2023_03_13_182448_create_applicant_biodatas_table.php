<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicant_biodatas', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->timestamps();
            $table->foreignUuid('applicant_id')->nullable(false)->unique()
                ->constrained()->cascadeOnDelete();
            $table->date('date_of_birth')->nullable(false);
            $table->char('gender', 1);
            $table->string('address')->nullable();
            $table->string('phone_number');
            $table->string('disability')->nullable();
            $table->string('level_of_study', 20);
            $table->string('course_of_study');
            $table->unsignedSmallInteger('year_of_study');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_biodatas');
    }
};