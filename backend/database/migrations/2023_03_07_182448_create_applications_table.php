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
        Schema::create('applications', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->timestamps();
            $table->foreignUuid('applicant_id')->nullable(false)
                ->constrained()->cascadeOnDelete();
            $table->foreignUuid('advert_id')->nullable(true)
                ->constrained()->nullOnDelete();
            $table->date('desired_start_date'); //date the applicant would like to start their attachment
            $table->date('expiry_date'); //date beyond which the application is invalid as per the applicant
            $table->string('status')->nullable(false)->default('pending'); //pending, accepted, rejected or canceled
            $table->timestamp('date_replied')->nullable();
            $table->unsignedTinyInteger('offer_accepted')->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};