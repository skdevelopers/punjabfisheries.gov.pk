<?php

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
        Schema::create('brood_productions', function (Blueprint $table) {
            $table->id();
            $table->string('hatchery_name');
            $table->string('species');
            $table->string('brood_type'); // Male, Female, Mixed
            $table->integer('brood_count');
            $table->decimal('avg_weight', 8, 2); // Average weight in grams
            $table->decimal('total_weight', 10, 2); // Total weight in kg
            $table->string('breeding_status'); // Ready, Spawning, Post-spawning, Resting
            $table->date('spawning_date')->nullable();
            $table->integer('eggs_collected')->nullable();
            $table->integer('fry_produced')->nullable();
            $table->decimal('survival_rate', 5, 2)->nullable(); // Survival rate percentage
            $table->text('notes')->nullable();
            $table->string('recorded_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brood_productions');
    }
};
