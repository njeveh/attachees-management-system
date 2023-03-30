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
        Schema::create('attachees', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->timestamps();
            $table->foreignUuid('applicant_id')->nullable(false)
                ->constrained()->cascadeOnDelete();
            $table->foreignUuid('application_id')->nullable()->constrained()->setNullOnDelete();
            $table->foreignUuid('department_id')->nullable(true)
                ->constrained()->cascadeOnDelete();
            $table->string('year')->nullable(true); //the finacial/academic year they are attached
            $table->unsignedTinyInteger('cohort')->nullable(true); //1,2,3,4
            /**
             * active, terminated_before_completion, completed,
             */
            $table->string('status')->nullable(false)->default('active');
            $table->string('position')->nullable();
            $table->timestamp('date_started')->nullable();
            $table->timestamp('date_terminated')->nullable();
            $table->string('termination_reason')->nullable();
            $table->tinyInteger('has_filled_evaluation_form')->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachees');
    }
};