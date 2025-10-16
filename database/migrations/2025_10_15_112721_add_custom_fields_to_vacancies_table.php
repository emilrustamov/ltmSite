<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            // Поля для "Другое" вариантов
            $table->string('custom_work_format')->nullable(); // Для "Другое" в формате работы
            $table->string('custom_language')->nullable(); // Для "Другое" в языках
            $table->string('custom_education')->nullable(); // Для "Другое" в образовании
            $table->string('custom_source')->nullable(); // Для "Другое" в источнике информации
            
            // Связи с городами
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('set null');
            $table->string('custom_city')->nullable(); // Для "Другое" в городах
            
            // Дополнительные поля из формы
            $table->text('work_experience_requirements')->nullable(); // Требования к опыту работы
            $table->text('education_requirements')->nullable(); // Требования к образованию
            $table->text('professional_plans')->nullable(); // Профессиональные планы
            $table->text('additional_info')->nullable(); // Дополнительная информация
        });
    }

    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn([
                'custom_work_format',
                'custom_language', 
                'custom_education',
                'custom_source',
                'city_id',
                'custom_city',
                'work_experience_requirements',
                'education_requirements',
                'professional_plans',
                'additional_info'
            ]);
        });
    }
};