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
        Schema::create('hatcheries', function (Blueprint $table) {
            $table->id();
            $table->string('hatchery_name');
            $table->string('contact_person');
            $table->string('mobile_number');
            $table->string('office_number')->nullable();
            $table->string('division');
            $table->string('district');
            $table->decimal('longitude', 10, 8)->nullable();
            $table->decimal('latitude', 11, 8)->nullable();
            $table->enum('office_type', ['HM', 'AQUA', 'BOTH']);
            $table->string('dd_adf_name')->nullable();
            $table->string('dd_adf_contact_number')->nullable();
            $table->timestamps();
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
