<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAndOrderingToPortfolio extends Migration
{
    public function up()
    {
        Schema::table('portfolio', function (Blueprint $table) {
            $table->boolean('status')->default(true); 
            $table->integer('ordering')->default(0);
        });
    }

    public function down()
    {
        Schema::table('portfolio', function (Blueprint $table) {
            $table->dropColumn(['status', 'ordering']);
        });
    }
}
