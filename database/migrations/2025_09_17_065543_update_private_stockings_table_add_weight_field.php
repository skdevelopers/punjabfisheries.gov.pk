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
        Schema::table('private_stockings', function (Blueprint $table) {
            $table->decimal('no', 10, 2)->change(); // Change from integer to decimal for weight
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('private_stockings', function (Blueprint $table) {
            $table->integer('no')->change(); // Revert back to integer
        });
    }
};
