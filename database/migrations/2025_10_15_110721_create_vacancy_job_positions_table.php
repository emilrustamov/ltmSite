<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancy_job_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('job_position_id')->constrained('job_positions')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['vacancy_id', 'job_position_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancy_job_positions');
    }
};