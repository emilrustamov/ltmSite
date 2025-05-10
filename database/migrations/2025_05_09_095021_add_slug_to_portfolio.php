<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolio', function (Blueprint $table) {
            // Добавляем slug после result, делаем nullable, чтобы избежать ошибок для старых записей
            $table->string('slug')->nullable()->unique()->after('result');
        });
    }

    public function down(): void
    {
        Schema::table('portfolio', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
