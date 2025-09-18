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
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['fish_production', 'seed_production', 'stocking', 'revenue', 'hatchery_development', 'research', 'training', 'other']);
            $table->enum('category', ['monthly', 'quarterly', 'yearly', 'custom']);
            $table->decimal('target_value', 15, 2);
            $table->decimal('achieved_value', 15, 2)->default(0);
            $table->string('unit')->default('kg'); // kg, pieces, rupees, etc.
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'completed', 'cancelled', 'paused'])->default('active');
            $table->string('assigned_to')->nullable(); // Department/Person responsible
            $table->text('notes')->nullable();
            $table->integer('priority')->default(1); // 1-5 priority level
            $table->boolean('is_public')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targets');
    }
};
