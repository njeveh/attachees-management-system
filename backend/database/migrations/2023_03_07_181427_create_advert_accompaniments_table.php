<?php

use App\Models\Advert;
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
        Schema::create('advert_accompaniments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Advert::class);
            $table->string('value')->nullable(false)->fulltext('value');
            $table->string('type')->nullable(false); //general_requirement || professional_requirement || intern_responsibility.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advert_accompaniments');
    }
};
