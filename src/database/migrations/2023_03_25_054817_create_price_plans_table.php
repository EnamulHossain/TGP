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
        Schema::create('price_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->string('plan_slug')->nullable();
            $table->string('plan_description')->nullable();
            $table->integer('sku')->nullable();
            $table->string('period')->nullable()->comment('1: weekly, 2: monthly, 3: yearly');
            $table->json('plan_properties')->nullable();
            $table->boolean('is_free')->default(false);
            $table->decimal('plan_price',14, 2)->nullable();
            $table->string('plan_tag')->nullable();
            $table->decimal('save_price',14, 2)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('price_plans');
    }
};
