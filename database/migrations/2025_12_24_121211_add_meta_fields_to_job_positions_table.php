<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            // Тип занятости (Полная занятость и т.д.)
            $table->string('employment_type_ru')->nullable();
            $table->string('employment_type_en')->nullable();
            $table->string('employment_type_tm')->nullable();

            // Формат работы (Удаленно, Офис и т.д.)
            $table->string('work_format_ru')->nullable();
            $table->string('work_format_en')->nullable();
            $table->string('work_format_tm')->nullable();

            // Зарплата
            $table->string('salary_ru')->nullable();
            $table->string('salary_en')->nullable();
            $table->string('salary_tm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            $table->dropColumn([
                'employment_type_ru',
                'employment_type_en',
                'employment_type_tm',
                'work_format_ru',
                'work_format_en',
                'work_format_tm',
                'salary_ru',
                'salary_en',
                'salary_tm'
            ]);
        });
    }
};
