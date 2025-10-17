<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('application_technical_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('applications')->onDelete('cascade');
            $table->foreignId('technical_skill_id')->constrained('technical_skills')->onDelete('cascade');
            $table->string('level')->nullable(); // Начальный, Средний, Продвинутый
            $table->integer('experience_years')->nullable(); // Годы опыта
            $table->text('notes')->nullable(); // Дополнительные заметки
            $table->timestamps();
            
            $table->unique(['application_id', 'technical_skill_id'], 'app_tech_skills_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_technical_skills');
    }
};
