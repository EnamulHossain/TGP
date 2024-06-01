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
            $table->integer('workflow_count')->default(0);
            $table->integer('approval_count')->default(0);
            $table->integer('reject_count')->default(0);
            $table->boolean('is_imported')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grant_info', function (Blueprint $table) {
            //
        });
    }
};
