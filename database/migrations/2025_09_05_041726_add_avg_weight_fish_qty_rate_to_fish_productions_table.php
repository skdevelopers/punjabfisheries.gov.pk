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
        Schema::table('fish_productions', function (Blueprint $table) {
            $table->decimal('avg_weight', 8, 2)->nullable()->after('avg_size'); // Average weight in grams
            $table->integer('fish_qty')->nullable()->after('avg_weight'); // Fish quantity
            $table->decimal('rate', 10, 2)->nullable()->after('fish_qty'); // Rate per unit
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fish_productions', function (Blueprint $table) {
            $table->dropColumn(['avg_weight', 'fish_qty', 'rate']);
        });
    }
};
