<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // If already present, don't touch it
        if (Schema::hasTable('user_scopes')) {
            return;
        }

        // Hard pre-reqs: both tables must exist for FKs
        if (! Schema::hasTable('users')) {
            throw new \RuntimeException('Pre-requisite table "users" not found before creating "user_scopes". Ensure the users migration runs first.');
        }
        if (! Schema::hasTable('org_units')) {
            throw new \RuntimeException('Pre-requisite table "org_units" not found before creating "user_scopes". Ensure the org_units migration runs first.');
        }

        Schema::create('user_scopes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')->cascadeOnDelete();

            $table->foreignId('org_unit_id')
                ->constrained('org_units')->cascadeOnDelete();

            $table->timestamps();

            // A user can be mapped to an org_unit only once
            $table->unique(['user_id', 'org_unit_id']);

            // Helpful single-column indexes for lookups
            $table->index('user_id');
            $table->index('org_unit_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_scopes');
    }
};
