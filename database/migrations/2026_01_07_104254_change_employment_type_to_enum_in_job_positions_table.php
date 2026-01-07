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
        Schema::table('job_positions', function (Blueprint $table) {
            // Удаляем старые поля employment_type
            $table->dropColumn(['employment_type_ru', 'employment_type_en', 'employment_type_tm']);
        });
        
        Schema::table('job_positions', function (Blueprint $table) {
            // Добавляем новое поле employment_type как enum по стандартам LinkedIn
            // Добавляем после conditions_tm, так как миграция add_requirements_and_conditions выполняется раньше
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'temporary', 'internship', 'volunteer'])->nullable()->after('conditions_tm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            // Удаляем enum поле
            $table->dropColumn('employment_type');
        });
        
        Schema::table('job_positions', function (Blueprint $table) {
            // Восстанавливаем старые поля employment_type
            $table->string('employment_type_ru')->nullable();
            $table->string('employment_type_en')->nullable();
            $table->string('employment_type_tm')->nullable();
        });
    }
};
