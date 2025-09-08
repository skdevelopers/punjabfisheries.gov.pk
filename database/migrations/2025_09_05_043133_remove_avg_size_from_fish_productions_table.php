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
            $table->dropColumn('avg_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fish_productions', function (Blueprint $table) {
            $table->decimal('avg_size', 8, 2)->after('production_kg');
        });
    }
};
