<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('application_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('applications')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('languages')->onDelete('cascade');
            $table->string('level')->nullable(); // A1, A2, B1, B2, C1, C2
            $table->timestamps();
            
            $table->unique(['application_id', 'language_id'], 'app_lang_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_languages');
    }
};
