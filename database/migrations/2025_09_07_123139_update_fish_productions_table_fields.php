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
            $table->decimal('total_weight', 10, 2)->nullable()->after('fish_qty');
            $table->dropColumn('production_kg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fish_productions', function (Blueprint $table) {
            $table->decimal('production_kg', 10, 2)->nullable()->after('weight_range');
            $table->dropColumn('total_weight');
        });
    }
};
