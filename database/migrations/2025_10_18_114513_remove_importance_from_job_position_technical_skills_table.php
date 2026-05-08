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
        Schema::table('job_position_technical_skills', function (Blueprint $table) {
            if (Schema::hasColumn('job_position_technical_skills', 'importance')) {
                $table->dropColumn('importance');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_position_technical_skills', function (Blueprint $table) {
            $table->enum('importance', ['required', 'preferred', 'optional'])->default('preferred');
        });
    }
};