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
        Schema::create('attachee_biodatas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Attachee::class)->nullable(false)->unique()
            ->constrained()
            ->cascadeOnDelete();
            $table->date('date_of_birth')->nullable(false);
            $table->string('address')->nullable();
            $table->string('phone_number');
            $table->string('disability')->nullable();
            $table->text('professional_summary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachee_biodatas');
    }
};
