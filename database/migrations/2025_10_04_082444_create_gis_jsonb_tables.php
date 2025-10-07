<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * GIS schema (JSONB; no PostGIS).
 *
 * - divisions / districts / tehsils: taxonomy (normalized)
 * - places: points or polygons in GeoJSON (JSONB)
 * - JSONB GIN indexes for geometry/properties
 * - Optional centroid_lat/lng for quick bbox filters
 */
return new class extends Migration {
    public function up(): void
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
            $table->unique(['division_id', 'name']);
        });

        Schema::create('tehsils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
            $table->unique(['district_id', 'name']);
        });

        Schema::create('places', function (Blueprint $table) {
            $table->id();

            // taxonomy (optional)
            $table->foreignId('division_id')->nullable()->constrained('divisions')->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('districts')->nullOnDelete();
            $table->foreignId('tehsil_id')->nullable()->constrained('tehsils')->nullOnDelete();

            // attributes
            $table->string('name');
            $table->enum('type', ['hatchery','farm','office'])->index();
            $table->string('owner')->nullable();
            $table->string('phone', 32)->nullable();

            // editorial workflow
            $table->enum('status', ['draft','published','archived'])->default('published')->index();
            $table->timestamp('published_at')->nullable();

            // geometry & properties
            $table->jsonb('geometry');      // valid GeoJSON geometry object
            $table->jsonb('properties')->nullable();

            // optional: store centroid for quick bbox queries
            $table->decimal('centroid_lat', 10, 7)->nullable()->index();
            $table->decimal('centroid_lng', 10, 7)->nullable()->index();

            $table->timestamps();

            $table->index(['division_id','district_id','tehsil_id']);
        });

        // JSONB indexes for geometry/properties
        DB::statement("CREATE INDEX places_geometry_gin   ON places USING GIN (geometry)");
        DB::statement("CREATE INDEX places_properties_gin ON places USING GIN (properties)");
    }

    public function down(): void
    {
        Schema::dropIfExists('places');
        Schema::dropIfExists('tehsils');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('divisions');
    }
};
