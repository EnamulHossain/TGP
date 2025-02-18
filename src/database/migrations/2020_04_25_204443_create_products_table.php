<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug');
            $table->string('reference')->nullable();
            $table->decimal('amount', 14, 2); // cost
            $table->decimal('special_amount', 14, 2)->nullable();
            $table->boolean('in_stock')->nullable(); // if in stock
            $table->timestamp('special_from')->nullable(); // aka posted_at
            $table->timestamp('special_to')->nullable();
            $table->integer('available')->unsigned()->nullable(); // how many items in stock
            $table->text('content');
            $table->integer('category_id')->unsigned()->index();
            $table->bigInteger('total_views')->unsigned()->default(0);
            $table->bigInteger('total_baskets')->unsigned()->default(0);
            $table->bigInteger('total_checkouts')->unsigned()->default(0);
            $table->bigInteger('total_purchases')->unsigned()->default(0);
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
        Schema::dropIfExists('products');
    }
}
