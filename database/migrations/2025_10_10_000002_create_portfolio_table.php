<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            
            // Основные поля
            $table->string('photo')->nullable();
            $table->string('url_button')->nullable();
            $table->date('when')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_main_page')->default(false);
            $table->integer('ordering')->default(0);
            
            // Мультиязычные поля - Русский
            $table->string('title_ru');
            $table->string('who_ru')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('target_ru')->nullable();
            $table->text('result_ru')->nullable();
            
            // Мультиязычные поля - Английский
            $table->string('title_en');
            $table->string('who_en')->nullable();
            $table->text('description_en')->nullable();
            $table->text('target_en')->nullable();
            $table->text('result_en')->nullable();
            
            // Мультиязычные поля - Туркменский
            $table->string('title_tm');
            $table->string('who_tm')->nullable();
            $table->text('description_tm')->nullable();
            $table->text('target_tm')->nullable();
            $table->text('result_tm')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};

