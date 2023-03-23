<?php

use App\Models\Advert;
use App\Models\Attachee;
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
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Attachee::class)->nullable(false)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Advert::class)->nullable(true)
                ->constrained()
                ->nullOnDelete();
            $table->tinyInteger('quarter')->nullable(false); //1,2,3,4
            $table->string('status')->nullable(false)->default('pending'); //pending, accepted, rejected or canceled
            $table->timestamp('date_replied');
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