<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->date('published_at')->nullable();
            
            // Мультиязычные поля - Русский
            $table->string('title_ru');
            $table->text('content_ru')->nullable();
            $table->text('excerpt_ru')->nullable();
            
            // Мультиязычные поля - Английский
            $table->string('title_en');
            $table->text('content_en')->nullable();
            $table->text('excerpt_en')->nullable();
            
            // Мультиязычные поля - Туркменский
            $table->string('title_tm');
            $table->text('content_tm')->nullable();
            $table->text('excerpt_tm')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};

