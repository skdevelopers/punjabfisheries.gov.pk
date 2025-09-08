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
        Schema::table('seed_productions', function (Blueprint $table) {
            $table->decimal('avg_weight', 8, 2)->nullable()->after('avg_size');
            $table->integer('fish_qty')->nullable()->after('avg_weight');
            $table->decimal('rate', 10, 2)->nullable()->after('fish_qty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_productions', function (Blueprint $table) {
            $table->dropColumn(['avg_weight', 'fish_qty', 'rate']);
        });
    }
};