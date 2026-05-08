<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained('portfolio')->onDelete('cascade');
            $table->string('locale', 2); // 'ru', 'en', 'tm'
            
            // Все переводимые поля
            $table->string('title');
            $table->string('who')->nullable();
            $table->text('description')->nullable();
            $table->text('target')->nullable();
            $table->text('result')->nullable();
            
            $table->timestamps();
            
            // Уникальность: один перевод на язык для каждого проекта
            $table->unique(['portfolio_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_translations');
    }
};
