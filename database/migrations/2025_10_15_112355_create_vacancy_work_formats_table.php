<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancy_work_formats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('work_format_id')->constrained('work_formats')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['vacancy_id', 'work_format_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancy_work_formats');
    }
};