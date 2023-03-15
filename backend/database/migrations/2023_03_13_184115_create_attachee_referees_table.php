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
        Schema::create('attachee_referees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Attachee::class)->nullable(false)
            ->constrained()->cascadeOnDelete();
            $table->string('name')->nullable(false);
            $table->string('relationship')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('institution')->nullable(false);
            $table->string('position_in_the_institution')->nullable(false);
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachee_referees');
    }
};
