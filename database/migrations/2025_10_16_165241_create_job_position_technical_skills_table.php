<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_position_technical_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_position_id')->constrained('job_positions')->onDelete('cascade');
            $table->foreignId('technical_skill_id')->constrained('technical_skills')->onDelete('cascade');
            $table->enum('importance', ['required', 'preferred', 'optional'])->default('preferred'); // Важность навыка для должности
            $table->timestamps();
            
            $table->unique(['job_position_id', 'technical_skill_id'], 'job_pos_tech_skill_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_position_technical_skills');
    }
};