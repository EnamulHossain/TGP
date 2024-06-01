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
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('grant_id')->nullable();
            $table->text('opportunity_name')->nullable();
            $table->timestamp('last_changed')->nullable();
            $table->integer('member_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email_address')->nullable();
            $table->boolean('paid_subscriber')->default(0);
            $table->string('page_url')->nullable();
            $table->text('opportunity_teaser')->nullable();
            $table->decimal('grant_funding_amount', 14, 2)->nullable();
            $table->date('deadline')->nullable();
            $table->bigInteger('snog')->nullable();
            $table->decimal('snof', 14, 0)->nullable();
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
        Schema::dropIfExists('newsletters');
    }
};
