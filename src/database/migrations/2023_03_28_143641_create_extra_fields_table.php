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
        Schema::create('extra_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level');
            $table->string('type');
            $table->string('placeholder');
            $table->string('is_prequired');
            $table->longText('options');
            $table->string('displaty_in_list');
            $table->string('model_name');
            $table->string('dependency_name');
            $table->string('dependency_value');
            $table->string('display_block');
            $table->string('permission_group');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_fields');
    }
};
