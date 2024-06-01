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
        Schema::create('use_later_datasets', function (Blueprint $table) {
            $table->id();
            $table->string('opportunity_name')->nullable();
            $table->timestamp('last_change')->nullable();
            $table->integer('member_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->integer('paid_subscriber')->nullable();
            $table->string('page_url')->nullable();
            $table->string('opportunity_teaser')->nullable();
            $table->integer('grand_funding_ammount')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->integer('snog')->nullable();
            $table->integer('snof')->nullable();
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
        Schema::dropIfExists('use_later_datasets');
    }
};
