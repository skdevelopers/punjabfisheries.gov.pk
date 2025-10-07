<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('ur_title')->nullable()->after('title');
            $table->string('ur_subtitle')->nullable()->after('subtitle');
            $table->text('ur_description')->nullable()->after('description');
            $table->string('ur_button_text')->nullable()->after('button_text');
        });
    }

    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn(['ur_title','ur_subtitle','ur_description','ur_button_text']);
        });
    }
};
