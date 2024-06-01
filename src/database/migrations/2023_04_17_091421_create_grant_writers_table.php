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
        Schema::create('grant_writers', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->string('country')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('addressline1')->nullable();
            $table->string('addressline2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zipcode')->nullable();
            $table->text('company')->nullable();
            $table->string('businessphone')->nullable();
            $table->string('altphone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->string('expertise_area1')->nullable();
            $table->string('experience_year1')->nullable();
            $table->string('describe_experience1')->nullable();

            $table->string('expertise_area2')->nullable();
            $table->string('experience_year2')->nullable();
            $table->string('describe_experience2')->nullable();

            $table->string('expertise_area3')->nullable();
            $table->string('experience_year3')->nullable();
            $table->string('describe_experience3')->nullable();

            $table->string('grant1_awarded_grant')->nullable();
            $table->string('grant1_awarded_amount')->nullable();
            $table->string('grant1_funding_source')->nullable();
            $table->string('grant1_writing_sample')->nullable();

            $table->string('grant2_awarded_grant')->nullable();
            $table->string('grant2_awarded_amount')->nullable();
            $table->string('grant2_funding_source')->nullable();
            $table->string('grant2_writing_sample')->nullable();
            
            $table->string('grant3_awarded_grant')->nullable();
            $table->string('grant3_awarded_amount')->nullable();
            $table->string('grant3_funding_source')->nullable();
            $table->string('grant3_writing_sample')->nullable();

            $table->string('grant4_awarded_grant')->nullable();
            $table->string('grant4_awarded_amount')->nullable();
            $table->string('grant4_funding_source')->nullable();

            $table->string('grant5_awarded_grant')->nullable();
            $table->string('grant5_awarded_amount')->nullable();
            $table->string('grant5_funding_source')->nullable();

            $table->string('ref_job_title')->nullable();
            $table->string('ref_organization')->nullable();
            $table->string('ref_first_name')->nullable();
            $table->string('ref_last_name')->nullable();
            $table->string('ref_phone_or_email')->nullable();
            $table->string('ref_capacity')->nullable();

            $table->string('ref2_job_title')->nullable();
            $table->string('ref2_organization')->nullable();
            $table->string('ref2_first_name')->nullable();
            $table->string('ref2_last_name')->nullable();
            $table->string('ref2_phone_or_email')->nullable();
            $table->string('ref2_capacity')->nullable();

            $table->string('ref3_job_title')->nullable();
            $table->string('ref3_organization')->nullable();
            $table->string('ref3_first_name')->nullable();
            $table->string('ref3_last_name')->nullable();
            $table->string('ref3_phone_or_email')->nullable();
            $table->string('ref3_capacity')->nullable();

            $table->tinyInteger('status')->nullable()->comment('0 = pending, 1 = send, 2 = failed');
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
        Schema::dropIfExists('grant_writers');
    }
};
