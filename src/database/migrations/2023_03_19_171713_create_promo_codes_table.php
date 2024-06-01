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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('properties_names')->nullable();
            $table->string('properties_general')->nullable();
            $table->string('properties_sorting')->nullable();
            $table->string('properties_search_engine')->nullable();
            $table->string('properties_teaser')->nullable();
            $table->string('properties_whats_new')->nullable();
            $table->string('properties_advanced')->nullable();
            $table->string('properties_options')->nullable();
            $table->string('properties_custom')->nullable();
            $table->string('properties_dynamic')->nullable();
            $table->string('tags')->nullable();
            $table->string('display_security')->nullable();
            $table->string('workflow_assingments')->nullable();
            $table->string('promo_code_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_codes');
    }
};
