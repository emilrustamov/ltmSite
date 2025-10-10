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
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};

