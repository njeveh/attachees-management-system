<?php

use App\Models\Department;
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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Department::class)->nullable(false)
            ->constrained()->cascadeOnDelete();
            $table->string('reference_number')->nullable(false)->default('JKUAT#ANoNyMoUs');
            $table->string('title')->nullable(false);
            $table->text('description');
            $table->string('year')->nullable(false);
            $table->smallInteger('cohort1_vacancies');
            $table->smallInteger('cohort2_vacancies');
            $table->smallInteger('cohort3_vacancies');
            $table->smallInteger('cohort4_vacancies');
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
