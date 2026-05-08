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
        // Сначала мигрируем данные из enum в work_formats
        // Находим или создаем записи в work_formats для стандартных значений
        $workFormats = [
            'on-site' => ['ru' => 'В офисе', 'en' => 'On-site', 'tm' => 'Ofisde'],
            'remote' => ['ru' => 'Удаленно', 'en' => 'Remote', 'tm' => 'Uzakdan'],
            'hybrid' => ['ru' => 'Гибридный', 'en' => 'Hybrid', 'tm' => 'Gibrid'],
        ];

        $formatMap = [];
        foreach ($workFormats as $enumValue => $names) {
            // Используем DB напрямую для создания записей
            $existing = \DB::table('work_formats')->where('slug', $enumValue)->first();
            if ($existing) {
                $formatMap[$enumValue] = $existing->id;
            } else {
                $id = \DB::table('work_formats')->insertGetId([
                    'slug' => $enumValue,
                    'name_ru' => $names['ru'],
                    'name_en' => $names['en'],
                    'name_tm' => $names['tm'],
                    'is_active' => true,
                    'sort_order' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $formatMap[$enumValue] = $id;
            }
        }

        // Сначала добавляем новое поле work_format_id
        Schema::table('job_positions', function (Blueprint $table) {
            $table->unsignedBigInteger('work_format_id')->nullable()->after('salary_tm');
        });

        // Обновляем существующие записи job_positions через SQL
        foreach ($formatMap as $enumValue => $formatId) {
            \DB::statement("UPDATE job_positions SET work_format_id = ? WHERE work_format = ?", [$formatId, $enumValue]);
        }

        // Теперь удаляем enum поле и добавляем foreign key
        Schema::table('job_positions', function (Blueprint $table) {
            $table->dropColumn('work_format');
        });

        Schema::table('job_positions', function (Blueprint $table) {
            $table->foreign('work_format_id')->references('id')->on('work_formats')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            $table->dropForeign(['work_format_id']);
            $table->dropColumn('work_format_id');
        });

        Schema::table('job_positions', function (Blueprint $table) {
            // Восстанавливаем enum
            $table->enum('work_format', ['on-site', 'remote', 'hybrid'])->nullable();
        });

        // Восстанавливаем данные из work_formats обратно в enum
        $formatMap = [
            'on-site' => \DB::table('work_formats')->where('slug', 'on-site')->value('id'),
            'remote' => \DB::table('work_formats')->where('slug', 'remote')->value('id'),
            'hybrid' => \DB::table('work_formats')->where('slug', 'hybrid')->value('id'),
        ];

        foreach ($formatMap as $enumValue => $formatId) {
            if ($formatId) {
                \DB::statement("UPDATE job_positions SET work_format = ? WHERE work_format_id = ?", [$enumValue, $formatId]);
            }
        }
    }
};
