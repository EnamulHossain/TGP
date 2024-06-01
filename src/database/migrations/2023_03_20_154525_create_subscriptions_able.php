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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('site_id')->unsigned()->index()->nullable();
            $table->string('type')->nullable();
            $table->string('user_name')->nullable();
            $table->string('order_number')->nullable();
            $table->float('subtotal')->nullable();
            $table->float('tax')->nullable();
            $table->string('shipping')->nullable();
            $table->string('service_fee')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_code')->nullable();
            $table->float('total')->nullable();
            $table->string('provider_customer_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->dateTime('expired_at')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
};
