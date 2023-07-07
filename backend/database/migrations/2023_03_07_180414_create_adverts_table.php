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
        Schema::create('adverts', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->timestamps();
            $table->foreignUuid('department_id')->nullable(false)
                ->constrained()->cascadeOnDelete();
            $table->string('reference_number')->nullable(false)->default('JKUAT#ANoNyMoUs');
            $table->string('title')->nullable(false)->fulltext('title');
            $table->text('description')->fulltext('description');
            $table->string('year')->nullable(false);
            $table->smallInteger('cohort1_vacancies');
            $table->smallInteger('cohort2_vacancies');
            $table->smallInteger('cohort3_vacancies');
            $table->smallInteger('cohort4_vacancies');
            $table->text('how_to_apply')->nullable();
            $table->string('author');
            $table->string('last_updated_by')->nullable();
            $table->string('last_approval_action_done_by')->nullable();
            $table->string('last_activation_action_done_by')->nullable();
            $table->string('approval_status')->nullable(false)->default('pending approval'); // pending_approval || approved || disapproved
            $table->unsignedTinyInteger('is_active')->nullable(false)->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};