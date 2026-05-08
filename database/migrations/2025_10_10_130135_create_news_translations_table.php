<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained('news')->onDelete('cascade');
            $table->string('locale', 2); // 'ru', 'en', 'tm'
            
            // Переводимые поля
            $table->string('title');
            $table->text('content')->nullable();
            $table->text('excerpt')->nullable();
            
            $table->timestamps();
            
            // Уникальность: один перевод на язык для каждой новости
            $table->unique(['news_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_translations');
    }
};
