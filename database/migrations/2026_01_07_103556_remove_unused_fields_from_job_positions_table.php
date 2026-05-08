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
            // Удаляем поля description
            $table->dropColumn(['description_ru', 'description_en', 'description_tm']);
            
            // Удаляем поля benefits
            $table->dropColumn(['benefits_ru', 'benefits_en', 'benefits_tm']);
            
            // Удаляем поле image
            $table->dropColumn('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            // Восстанавливаем поля description
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_tm')->nullable();
            
            // Восстанавливаем поля benefits
            $table->text('benefits_ru')->nullable();
            $table->text('benefits_en')->nullable();
            $table->text('benefits_tm')->nullable();
            
            // Восстанавливаем поле image
            $table->string('image')->nullable();
        });
    }
};
