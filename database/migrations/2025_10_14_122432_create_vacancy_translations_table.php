<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancy_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->string('locale', 2); // 'ru', 'en', 'tm'
            
            // Переводимые поля
            $table->string('title');
            $table->text('description')->nullable(); // Описание вакансии
            $table->text('requirements')->nullable(); // Требования
            $table->text('responsibilities')->nullable(); // Обязанности
            $table->text('benefits')->nullable(); // Преимущества/бонусы
            $table->string('company_name')->nullable(); // Название компании
            $table->text('company_description')->nullable(); // Описание компании
            
            $table->timestamps();
            
            // Уникальность: один перевод на язык для каждой вакансии
            $table->unique(['vacancy_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancy_translations');
    }
};