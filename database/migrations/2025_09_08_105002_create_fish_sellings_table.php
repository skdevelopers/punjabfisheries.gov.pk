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
        Schema::create('fish_sellings', function (Blueprint $table) {
            $table->id();
            $table->enum('species', [
                'Rohu', 'Mori', 'Thalia', 'Grass Carp', 'Gulfam', 'Pangasius', 'Kalbans', 'Seabass', 'Mahseer', 
                'Silver Carp', 'Bighead', 'Carp', 'Clarias', 'Mullee', 'Khagga', 'Saul', 'Singharee', 'Tilapia', 
                'Trash and Weed Fish', 'Trout', 'Jhalli', 'Other'
            ]);
            $table->string('weight_range')->nullable();
            $table->decimal('rate', 10, 2)->nullable();
            $table->integer('fish_qty')->nullable();
            $table->decimal('total_weight', 10, 2)->nullable();
            $table->decimal('avg_weight', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_sellings');
    }
};