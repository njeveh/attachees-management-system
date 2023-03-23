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
        Schema::table('attachees', function (Blueprint $table) {
            // $table->timestamp('date_started')->nullable();
            // $table->timestamp('date_terminated')->nullable();
            $table->string('termination_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attachees', function (Blueprint $table) {
            //
        });
    }
};