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
        Schema::create('seed_productions', function (Blueprint $table) {
            $table->id();
            $table->enum('species', [
                'Rohu', 'Mori', 'Thalia', 'Silver Carp', 'Grass Carp',
                'Big Head', 'Tilapia', 'Gulfam', 'Catfish', 'Other'
            ]);
            $table->decimal('production_kg', 10, 2); // Production in KG
            $table->decimal('avg_size', 8, 2); // Average size in cm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seed_productions');
    }
};
