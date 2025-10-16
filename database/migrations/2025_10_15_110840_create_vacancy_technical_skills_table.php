<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancy_technical_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('technical_skill_id')->constrained('technical_skills')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['vacancy_id', 'technical_skill_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancy_technical_skills');
    }
};