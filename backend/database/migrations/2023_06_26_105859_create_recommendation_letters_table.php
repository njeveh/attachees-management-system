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
        Schema::create('recommendation_letters', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->foreignUuid('attachee_id')->nullable(false)->constrained()->cascadeOnDelete();
            $table->string('path')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendation_letters');
    }
};
