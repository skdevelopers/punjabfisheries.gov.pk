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
            $table->string('size_category')->nullable()->after('species');
            $table->decimal('quantity', 10, 2)->nullable()->after('size_category');
            $table->decimal('total_amount', 10, 2)->nullable()->after('quantity');
            
            // Drop old columns
            $table->dropColumn(['production_kg', 'avg_weight', 'fish_qty']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_productions', function (Blueprint $table) {
            $table->decimal('production_kg', 10, 2)->nullable()->after('species');
            $table->decimal('avg_weight', 10, 2)->nullable()->after('production_kg');
            $table->integer('fish_qty')->nullable()->after('avg_weight');
            
            // Drop new columns
            $table->dropColumn(['size_category', 'quantity', 'total_amount']);
        });
    }
};
