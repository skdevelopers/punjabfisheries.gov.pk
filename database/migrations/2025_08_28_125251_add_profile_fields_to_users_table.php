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
        Schema::table('users', function (Blueprint $table): void {
            $table->string('staff_id')->nullable()->index();
            $table->string('designation')->nullable();
            $table->string('section')->nullable();
            $table->string('phone')->nullable();
            $table->string('office_location')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('office_name')->nullable();
            $table->string('directorate_name')->nullable();
            $table->string('division_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('profile_photo_path')->nullable(); // storage/app/public/profile-photos/...
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn([
                'staff_id','designation','section','phone','office_location','joining_date',
                'office_name','directorate_name','division_name','district_name','profile_photo_path',
            ]);
        });
    }
};
