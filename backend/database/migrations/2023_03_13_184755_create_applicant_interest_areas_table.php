<?php

use App\Models\Applicant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicant_interest_areas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignUuid('applicant_id')->nullable(false)
                ->constrained()->cascadeOnDelete();
            $table->string('area_of_interest')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_interest_areas');
    }
};