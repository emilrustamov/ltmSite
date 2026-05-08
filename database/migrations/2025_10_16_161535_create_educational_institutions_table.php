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
        Schema::create('educational_institutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('applications')->onDelete('cascade');
            $table->string('institution_name'); // Название учебного заведения
            $table->string('degree')->nullable(); // Степень/специальность
            $table->string('faculty')->nullable(); // Факультет
            $table->date('start_date')->nullable(); // Дата начала обучения
            $table->date('end_date')->nullable(); // Дата окончания обучения
            $table->text('description')->nullable(); // Дополнительная информация
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_institutions');
    }
};
