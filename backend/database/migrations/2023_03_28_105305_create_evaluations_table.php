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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('course_being_pursued');
            $table->string('level_of_study');
            $table->foreignUuid('department_id')->constrained()->cascadeOnDelete();
            $table->string('year');
            $table->tinyInteger('cohort');
            $table->string('supervisor_name');
            $table->smallInteger('attachment_duration'); //weeks
            $table->text('part1_quiz');
            $table->text('part2_quiz');
            $table->tinyInteger('recommendable_to_friends');
            $table->string('reasons_if_not_recommendable', 500)->nullable();
            $table->text('recommendations_to_university')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};