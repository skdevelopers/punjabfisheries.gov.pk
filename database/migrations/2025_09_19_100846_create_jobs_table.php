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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->string('employment_type')->nullable(); // Full-time, Part-time, Contract
            $table->string('experience_level')->nullable(); // Entry, Mid, Senior
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->date('application_deadline')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('status')->default('open'); // open, closed, filled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
