<?php

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('department_admins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(User::class)->nullable(false)
            ->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Department::class)->nullable(false)
                ->constrained()->cascadeOnDelete();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_admins');
    }
};
