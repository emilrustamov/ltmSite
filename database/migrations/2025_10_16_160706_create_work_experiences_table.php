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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('applications')->onDelete('cascade');
            $table->string('company_name'); // Название компании
            $table->string('position'); // Должность
            $table->date('start_date'); // Дата начала работы
            $table->date('end_date')->nullable(); // Дата окончания (null если текущая работа)
            $table->text('description')->nullable(); // Описание обязанностей
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
