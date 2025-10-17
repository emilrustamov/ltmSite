<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technical_skills', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru'); // Название на русском
            $table->string('name_en')->nullable(); // Название на английском
            $table->string('name_tm')->nullable(); // Название на туркменском
            $table->string('slug')->unique(); // Уникальный идентификатор
            $table->boolean('is_active')->default(true); // Активен ли навык
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technical_skills');
    }
};