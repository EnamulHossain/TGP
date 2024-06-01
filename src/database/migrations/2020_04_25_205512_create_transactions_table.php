<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable(); // token/id
            $table->decimal('amount', 14, 2); // total
            $table->decimal('amount_items', 14, 2); // total items
            $table->decimal('amount_tax', 14, 2); // 15% tax
            $table->decimal('amount_original', 14, 2)->nullable(); // total
            $table->string('token'); // token/id
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('checkout_id')->nullable(); // when linked
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->timestamp('linked_checkout_at')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
