<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grants_info', function (Blueprint $table) {
            $table->boolean('is_ongoing')->default(0)->change();
            $table->boolean('is_opening')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grants_info', function (Blueprint $table) {
            $table->boolean('is_ongoing')->nullable()->change();
            $table->boolean('is_opening')->nullable()->change();
        });
    }
};
