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
            $table->json('title');
            $table->json('who');
            $table->json('description');
            $table->json('target');
            $table->json('result');
            $table->string('photo')->nullable();
            $table->string('urlButton')->nullable();
            $table->date('when')->nullable();
            $table->boolean('isMainPage')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};
