<?php

use App\Models\Department;
use App\Models\User;
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
        Schema::create('attachees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(User::class)->nullable(false)
            ->constrained()->cascadeOnDelete();
            $table->string('national_id')->nullable(false);
            $table->string('first_name')->nullable(false);
            $table->string('second_name')->nullable(false);
            $table->string('institution')->nullable(false);
            $table->string('year')->nullable(true); //the finacial/academic year they are attached
            $table->unsignedTinyInteger('cohort')->nullable(true); //1,2,3,4
            $table->foreignIdFor(Department::class)->nullable(true);
            /**
             * 0=>has_made_no_application, 1=>has_made_application, 2=>got_response,
            * 3=>accepted_offer, 4=>reported, 5=>terminated_before_completion, 6=>'completed'.
            */
            $table->smallInteger('engagement_level')->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachees');
    }
};
