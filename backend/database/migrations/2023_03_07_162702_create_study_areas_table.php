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
        Schema::create('study_areas', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('title')->nullable(false)->fulltext('title');
            $table->foreignUuid('department_id')->nullable(false)->constrained()->cascadeOnDelete();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_areas');
    }
};
