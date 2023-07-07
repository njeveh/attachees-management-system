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
        Schema::create('dipca_admins', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->timestamps();
            $table->foreignUuid('user_id')->nullable(false)
                ->constrained()->cascadeOnDelete();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('staff_id')->nullable(false);
            $table->string('phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dipca_admins');
    }
};