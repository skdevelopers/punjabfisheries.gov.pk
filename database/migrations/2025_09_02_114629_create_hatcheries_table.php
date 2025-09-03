<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Table optimized for common filters (division, district, office_type) + geo columns.
     * Indexes:
     *  - division, district, office_type (single + composite)
     *  - latitude, longitude (separate indexes for box-queries; switch to spatial later)
     */
    public function up(): void
    {
        Schema::create('hatcheries', function (Blueprint $table): void {
            $table->id();

            $table->string('name', 150);                // Hatchery Name
            $table->string('contact_person', 120)->nullable();
            $table->string('mobile_number', 30)->nullable();
            $table->string('office_number', 30)->nullable();

            $table->string('division', 100);            // Normalize later to FK if you add lookups
            $table->string('district', 100);

            $table->string('office_address', 255)->nullable();

            // Store as precise decimals (DB-agnostic). 8–7 precision gives ~1.1cm resolution.
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // HM | AQUA | both  (string keeps it portable across MySQL/Postgres)
            $table->string('office_type', 10)->index();

            // These appear only when office_type = 'both' — still nullable at DB level.
            $table->string('dd_adf_name', 120)->nullable();
            $table->string('dd_adf_contact_number', 30)->nullable();

            $table->timestamps();

            // Helpful indexes for speed on list & search
            $table->index(['division']);
            $table->index(['district']);
            $table->index(['division', 'district']);
            $table->index(['division', 'district', 'office_type']); // frequent combined filter
            $table->index(['latitude']);
            $table->index(['longitude']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hatcheries');
    }
};
