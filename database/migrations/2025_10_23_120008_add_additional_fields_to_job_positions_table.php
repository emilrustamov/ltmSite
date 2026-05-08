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
            // Описание вакансии на трех языках
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_tm')->nullable();
            
            // Обязанности на трех языках
            $table->text('responsibilities_ru')->nullable();
            $table->text('responsibilities_en')->nullable();
            $table->text('responsibilities_tm')->nullable();
            
            // Преимущества работы на трех языках
            $table->text('benefits_ru')->nullable();
            $table->text('benefits_en')->nullable();
            $table->text('benefits_tm')->nullable();
            
            // Изображение вакансии
            $table->string('image')->nullable();
            
            // Поля для управления отображением
            $table->boolean('status')->default(true);
            $table->integer('ordering')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            $table->dropColumn([
                'description_ru', 'description_en', 'description_tm',
                'responsibilities_ru', 'responsibilities_en', 'responsibilities_tm',
                'benefits_ru', 'benefits_en', 'benefits_tm',
                'image', 'status', 'ordering'
            ]);
        });
    }
};
