<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Имя (необязательно)
            $table->string('surname'); // Фамилия (обязательно)
            $table->string('email'); // Email (обязательно)
            $table->string('phone'); // Телефон (обязательно)
            $table->date('date_of_birth'); // Дата рождения (обязательно)
            $table->string('expected_salary'); // Ожидаемая зарплата (обязательно)
            $table->text('personal_info')->nullable(); // Личная информация (необязательно)
            $table->text('contact_info')->nullable(); // Контактная информация (необязательно)
            $table->string('linkedin_url')->nullable(); // Ссылка на LinkedIn (необязательно)
            $table->string('github_url')->nullable(); // Ссылка на GitHub (необязательно)
            $table->unsignedBigInteger('city_id')->nullable(); // Связь с городом
            $table->string('custom_city')->nullable(); // Свой город
            $table->string('registration_address'); // Адрес по прописке (обязательно)
            $table->unsignedBigInteger('source_id'); // Связь с источником (обязательно)
            $table->string('custom_source')->nullable(); // Свой источник
            $table->unsignedBigInteger('work_format_id'); // Связь с форматом работы (обязательно)
            $table->string('custom_work_format')->nullable(); // Свой формат работы
            $table->unsignedBigInteger('education_id'); // Связь с образованием (обязательно)
            $table->string('custom_education')->nullable(); // Свое образование
            $table->string('custom_language')->nullable(); // Свой язык (необязательно)
            $table->string('cv_file')->nullable(); // Путь к CV файлу
            $table->text('professional_plans'); // Профессиональные планы на ближайшие годы (обязательно)
            $table->text('other_notes')->nullable(); // Другие заметки (необязательно)
            // Опыт работы хранится в отдельной таблице work_experiences
            $table->boolean('status')->default(true); // Статус заявки
            
            $table->timestamps();
            
            // Внешние ключи
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
            $table->foreign('work_format_id')->references('id')->on('work_formats')->onDelete('cascade');
            $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};