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
        Schema::create('applicants', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->timestamps();
            $table->foreignUuid('user_id')->nullable(false)
                ->constrained()->cascadeOnDelete();
            $table->string('national_id')->nullable(false)->unique();
            $table->string('first_name')->nullable(false);
            $table->string('second_name')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('institution')->nullable(false);
            /**
             * 0=>has_made_no_application, 1=>has_made_application, 2=>got_response,
             * 3=>got_offer_but_offer_revoked 4=>got_and_accepted_offer, 5=>reported, 6=>terminated_before_completion, 7=>'completed'.
             */
            $table->smallInteger('engagement_level')->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};