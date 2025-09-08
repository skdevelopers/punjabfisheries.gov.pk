<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('org_units')) {
            return; // already created
        }

        Schema::create('org_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');                       // e.g. "Director (HM)"
            $table->string('code')->unique();             // e.g. "DIR_HM"
            $table->string('type');                       // directorate|division|section|facility|project|site|position
            $table->string('grade_code')->nullable();     // e.g. "BS-19"
            $table->unsignedInteger('headcount')->default(1);
            $table->unsignedInteger('sort_order')->default(0);
            $table->foreignId('parent_id')->nullable()
                ->constrained('org_units')->nullOnDelete(); // self-FK
            $table->timestamps();

            $table->index(['type', 'parent_id']);
            $table->index(['sort_order']);
        });

        // Optional CHECK on "type" domain (ignore if not supported / already exists)
        try {
            DB::statement("
                ALTER TABLE org_units
                ADD CONSTRAINT org_units_type_check
                CHECK (type IN ('directorate','division','section','facility','project','site','position'))
            ");
        } catch (\Throwable $e) {
            // no-op
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('org_units');
    }
};
