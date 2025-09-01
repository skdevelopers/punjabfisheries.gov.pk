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
        Schema::create('org_unit_edges', function (Blueprint $t) {
            $t->id();
            $t->foreignId('from_org_unit_id')->constrained('org_units')->cascadeOnDelete();
            $t->foreignId('to_org_unit_id')->constrained('org_units')->cascadeOnDelete();
            $t->string('edge_type')->default('reports_to'); // future use
            $t->timestamps();
            $t->unique(['from_org_unit_id','to_org_unit_id','edge_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org_unit_edges');
    }
};
