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
        Schema::create('org_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // e.g. Director (HM)
            $table->string('code')->unique();           // e.g. DIR_HM
            $table->string('type');                     // directorate|division|section|facility|project|site|position
            $table->string('grade_code')->nullable();   // e.g. BS-19
            $table->unsignedInteger('headcount')->default(1);   // how many seats on this post (see note below)
            $table->unsignedInteger('sort_order')->default(0);  // stable ordering in trees/menus
            $table->foreignId('parent_id')->nullable()->constrained('org_units')->nullOnDelete();
            $table->timestamps();

            $table->index(['type', 'parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org_units');
    }
};
