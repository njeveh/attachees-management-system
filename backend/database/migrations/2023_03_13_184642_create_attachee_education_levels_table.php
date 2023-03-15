<?php

use App\Models\Attachee;
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
        Schema::create('attachee_education_levels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Attachee::class)->nullable(false)
            ->constrained()->cascadeOnDelete();
            $table->string('education_level')->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachee_education_levels');
    }
};
