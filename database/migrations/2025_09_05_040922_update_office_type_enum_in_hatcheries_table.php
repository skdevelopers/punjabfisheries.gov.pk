<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, update any existing 'BOTH' records to 'HM' as default
        DB::table('hatcheries')->where('office_type', 'BOTH')->update(['office_type' => 'HM']);
        
        // For PostgreSQL, we need to recreate the enum type
        DB::statement("ALTER TABLE hatcheries ALTER COLUMN office_type TYPE VARCHAR(10)");
        DB::statement("ALTER TABLE hatcheries ADD CONSTRAINT check_office_type CHECK (office_type IN ('HM', 'AQUA'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the constraint and restore original enum
        DB::statement("ALTER TABLE hatcheries DROP CONSTRAINT IF EXISTS check_office_type");
        DB::statement("ALTER TABLE hatcheries ALTER COLUMN office_type TYPE VARCHAR(10)");
        DB::statement("ALTER TABLE hatcheries ADD CONSTRAINT check_office_type CHECK (office_type IN ('HM', 'AQUA', 'BOTH'))");
    }
};
