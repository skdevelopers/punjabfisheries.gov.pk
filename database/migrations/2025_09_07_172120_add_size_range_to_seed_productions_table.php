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
            $table->string('size_range')->nullable()->after('species');
            $table->dropColumn('size_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_productions', function (Blueprint $table) {
            $table->string('size_category')->nullable()->after('species');
            $table->dropColumn('size_range');
        });
    }
};
