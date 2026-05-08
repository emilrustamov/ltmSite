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
            // Удаляем старые поля work_format
            $table->dropColumn(['work_format_ru', 'work_format_en', 'work_format_tm']);
        });
        
        Schema::table('job_positions', function (Blueprint $table) {
            // Добавляем новое поле work_format как enum по стандартам LinkedIn
            $table->enum('work_format', ['on-site', 'remote', 'hybrid'])->nullable()->after('salary_tm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            // Удаляем enum поле
            $table->dropColumn('work_format');
        });
        
        Schema::table('job_positions', function (Blueprint $table) {
            // Восстанавливаем старые поля work_format
            $table->string('work_format_ru')->nullable();
            $table->string('work_format_en')->nullable();
            $table->string('work_format_tm')->nullable();
        });
    }
};
