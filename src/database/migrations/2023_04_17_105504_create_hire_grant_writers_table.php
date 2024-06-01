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
        Schema::create('hire_grant_writers', function (Blueprint $table) {
            $table->id();
            $table->boolean('have_grant_application')->default(0);
            $table->boolean('need_grant_writer')->default(0);
            $table->string('purpose')->nullable();
            $table->string('describe')->nullable();
            $table->string('additional_details')->nullable();
            $table->date('choose_date')->nullable();
            $table->string('legal_Structure')->nullable();
            $table->string('other')->nullable();
            $table->string('description')->nullable();
            $table->string('generate_revenue')->nullable();
            $table->string('company_existence_year')->nullable();
            $table->string('company_existence_month')->nullable();
            $table->boolean('cms_forms_fundraising_packet')->default(0);
            $table->boolean('cms_forms_agency_mission')->default(0);
            $table->string('cms_forms_when_begin_work')->nullable();
            $table->boolean('cms_forms_copy_previous_application')->default(0);
            $table->boolean('cms_forms_previously_received')->default(0);
            $table->string('cms_forms_first_time_applying_for_funds')->nullable();
            $table->string('geographic_areas')->nullable();
            $table->string('additional_details_for_apply')->nullable();
            $table->string('describe_your_grant_history')->nullable();
            $table->string('details_previous_grant_application')->nullable();
            $table->string('fundraising_details')->nullable();
            $table->string('details_missing_statement')->nullable();
            $table->string('job_title')->nullable();
            $table->string('country')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->text('company')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('hire_grant_writers');
    }
};
