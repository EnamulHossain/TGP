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
        Schema::create('i_am_a_grant_providers', function (Blueprint $table) {
            $table->id();
            $table->string('legal_Structure')->nullable();
            $table->string('other_eligible_for_grant_provider')->nullable();
            $table->string('short_description1')->nullable();
            $table->string('short_description2')->nullable();
            $table->string('job_title')->nullable();
            $table->string('country')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('addressline1')->nullable();
            $table->string('addressline2')->nullable();
            $table->string('city')->nullable();
            $table->integer('zipcode')->nullable();
            $table->text('company')->nullable();
            $table->string('businessphone')->nullable();
            $table->string('altphone')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('status')->nullable()->comment('0 = pending, 1 = send, 2 = failed');
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
        Schema::dropIfExists('i_am_a_grant_providers');
    }
};
