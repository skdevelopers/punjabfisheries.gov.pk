<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('org_unit_edges')) {
            return;
        }

        // Hard prereq guards (fail fast with a clear message if ordering is wrong)
        if (! Schema::hasTable('org_units')) {
            throw new \RuntimeException('Prerequisite table "org_units" is missing. Ensure the org_units migration runs before org_unit_edges.');
        }

        Schema::create('org_unit_edges', function (Blueprint $table) {
            $table->id();

            // adjacency/closure support
            $table->foreignId('from_org_unit_id')
                ->constrained('org_units')->cascadeOnDelete();

            $table->foreignId('to_org_unit_id')
                ->constrained('org_units')->cascadeOnDelete();

            // optional: direct, inherited, reporting, etc.
            $table->string('edge_type')->default('hierarchy');

            // optional: store distance in closure-like graphs (0=self, 1=parent, 2=grandparent, ...)
            $table->unsignedInteger('depth')->default(1);

            $table->timestamps();

            // A specific relationship only once
            $table->unique(['from_org_unit_id','to_org_unit_id','edge_type'], 'org_unit_edges_unique_triplet');

            // Helpful lookups
            $table->index(['from_org_unit_id']);
            $table->index(['to_org_unit_id']);
            $table->index(['edge_type']);
        });

        // Optional CHECK on edge_type
        try {
            DB::statement("
                ALTER TABLE org_unit_edges
                ADD CONSTRAINT org_unit_edges_type_check
                CHECK (edge_type IN ('hierarchy','reporting','assignment','other'))
            ");
        } catch (\Throwable $e) {
            // no-op
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('org_unit_edges');
    }
};
