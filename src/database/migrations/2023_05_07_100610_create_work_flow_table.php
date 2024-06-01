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
        Schema::create('work_flows', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('work_flow')->nullable()->comment('1: auto_approval, 2: one_direct_approval, 3: one_before_edit_approval, 4: two_direct_approval, 5: two_before_edit_approval');
            $table->json('roles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_flows');
    }
};
