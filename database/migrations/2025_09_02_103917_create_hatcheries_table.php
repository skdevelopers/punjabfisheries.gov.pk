<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // no-op if already created
        if (Schema::hasTable('hatcheries')) {
            return;
        }

        Schema::create('hatcheries', function (Blueprint $table) {
            $table->id();

            // keep your original column names & types
            $table->string('hatchery_name');
            $table->string('contact_person');
            $table->string('mobile_number');
            $table->string('office_number')->nullable();
            $table->string('division');
            $table->string('district');
            $table->decimal('longitude', 10, 8)->nullable();
            $table->decimal('latitude', 11, 8)->nullable();
            $table->enum('office_type', ['HM', 'AQUA']); // kept exactly per your version
            $table->string('dd_adf_name')->nullable();
            $table->string('dd_adf_contact_number')->nullable();

            $table->timestamps();

            // ---- Indexes (single + composite) ----
            $table->index('division');
            $table->index('district');
            $table->index('office_type');

            $table->index(['division', 'district']);
            $table->index(['division', 'district', 'office_type']); // frequent combined filter

            // Geo helpers (simple btree – good for box/range filters)
            $table->index('latitude');
            $table->index('longitude');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hatcheries');
    }
};
