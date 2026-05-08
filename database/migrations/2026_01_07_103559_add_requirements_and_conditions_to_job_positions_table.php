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
            // Добавляем поля requirements (требования) на трех языках
            $table->text('requirements_ru')->nullable()->after('responsibilities_tm');
            $table->text('requirements_en')->nullable()->after('requirements_ru');
            $table->text('requirements_tm')->nullable()->after('requirements_en');
            
            // Добавляем поля conditions (условия) на трех языках
            $table->text('conditions_ru')->nullable()->after('requirements_tm');
            $table->text('conditions_en')->nullable()->after('conditions_ru');
            $table->text('conditions_tm')->nullable()->after('conditions_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            // Удаляем поля requirements
            $table->dropColumn(['requirements_ru', 'requirements_en', 'requirements_tm']);
            
            // Удаляем поля conditions
            $table->dropColumn(['conditions_ru', 'conditions_en', 'conditions_tm']);
        });
    }
};
