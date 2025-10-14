<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_featured')->default(false); // Рекомендуемая вакансия
            $table->string('location')->nullable(); // Местоположение
            $table->string('employment_type')->nullable(); // Тип занятости (полная, частичная, удаленная)
            $table->decimal('salary_from', 10, 2)->nullable(); // Зарплата от
            $table->decimal('salary_to', 10, 2)->nullable(); // Зарплата до
            $table->string('experience_level')->nullable(); // Уровень опыта
            $table->date('application_deadline')->nullable(); // Дедлайн подачи заявки
            $table->date('published_at')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};