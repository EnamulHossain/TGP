<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grants_info', function (Blueprint $table) {
            $table->id();
            $table->integer('site_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->longText('opportunity_title')->nullable();
            $table->longText('opportunity_teaser')->nullable();
            $table->longText('opportunity_title_for_subscriber')->nullable();
            $table->longText('opportunity_description_for_subscriber')->nullable();
            $table->decimal('amount_low', 14, 2)->nullable();
            $table->decimal('amount_high', 14, 2)->nullable();
            $table->date('close_date_at')->nullable();
            $table->date('deadline_at')->nullable();
            $table->date('letter_of_intent_deadline_at')->nullable();
            $table->date('posted_date_at')->nullable();
            // $table->string('url')->nullable()->unique();
            $table->text('url')->nullable();
            $table->text('funding_source')->nullable();
            $table->integer('funding_agency_id')->unsigned();
            $table->longText('additional_notes')->nullable();
            $table->integer('is_ongoing')->nullable();
            $table->integer('is_opening')->nullable();
            $table->integer('status')->default(4)->comment('1: pending, 2: accepted, 3: rejected, 4: draft, 5: archive');
            $table->integer('approved_by')->unsigned()->nullable();
            $table->integer('rejected_by')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
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
        Schema::dropIfExists('grants_info');
    }
};
