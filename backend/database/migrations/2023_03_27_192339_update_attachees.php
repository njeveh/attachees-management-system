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
            // $table->foreignUuid('advert_id')->nullable()->constrained()->setNullOnDelete();
            //$table->tinyInteger('has_filled_evaluation_form')->nullable();
            $table->foreignUuid('application_id')->nullable()->constrained()->setNullOnDelete();
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