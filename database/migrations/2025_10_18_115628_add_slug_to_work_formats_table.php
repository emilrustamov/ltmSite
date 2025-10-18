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
        Schema::table('work_formats', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name_tm');
        });
        
        // Заполняем slug для существующих записей
        \App\Models\WorkFormat::all()->each(function ($workFormat) {
            $workFormat->update([
                'slug' => \Illuminate\Support\Str::slug($workFormat->name_ru) . '-' . $workFormat->id
            ]);
        });
        
        // Теперь делаем поле уникальным
        Schema::table('work_formats', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('work_formats', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
